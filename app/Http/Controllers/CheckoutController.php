<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TablaCarrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use MercadoPago\SDK;
use MercadoPago\Preference;

class CheckoutController extends Controller
{
    protected function getOrCreateCart(int $userId): TablaCarrito
    {
        return TablaCarrito::firstOrCreate(
            ['id_user' => $userId],
            ['productosYcantidad_ids' => [], 'CantidadProductos' => 0, 'seleccionado' => true]
        );
    }

    /**
     * Normaliza items del carrito a formato estable:
     * [
     *   product_id:int, quantity:int, escojido:bool, color:string, talla:?string
     * ]
     */
    protected function normalizeItems(TablaCarrito $cart): array
    {
        $raw = $cart->productosYcantidad_ids;

        if (is_string($raw)) {
            $items = json_decode($raw, true);
            $items = is_array($items) ? $items : [];
        } elseif (is_array($raw)) {
            $items = $raw;
        } else {
            $items = [];
        }

        $normalized = [];

        foreach ($items as $it) {
            if (is_object($it)) $it = (array) $it;
            if (!is_array($it)) continue;

            $pid = (int)($it['product_id'] ?? 0);
            if ($pid <= 0) continue;

            $qty = (int)($it['quantity'] ?? ($it['qty'] ?? 0));
            if ($qty < 0) $qty = 0;

            $color = trim((string)($it['color'] ?? ''));
            $talla = isset($it['talla']) ? trim((string)$it['talla']) : null;
            $talla = ($talla === '') ? null : $talla;

            $escojido = array_key_exists('escojido', $it) ? (bool)$it['escojido'] : true;

            $normalized[] = [
                'id'         => $pid,
                'product_id' => $pid,
                'quantity'   => $qty,
                'color'      => $color,
                'talla'      => $talla,
                'escojido'   => $escojido,
            ];
        }

        return $normalized;
    }

    /**
     * Convierte precios tipo "102.000", "102,000.00", "$ 102.000" a float correcto.
     */
    protected function mpMoney($value): float
    {
        $s = trim((string)$value);

        $s = preg_replace('/[^\d\.,]/', '', $s);

        if (str_contains($s, '.') && !str_contains($s, ',')) {
            $s = str_replace('.', '', $s);
        }

        if (str_contains($s, ',')) {
            $s = str_replace('.', '', $s);
            $s = str_replace(',', '.', $s);
        }

        return (float)$s;
    }

    public function iniciar(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) return redirect()->route('login');

        // Validar token primero
        $accessToken = config('services.mercadopago.access_token');
        if (!$accessToken) {
            return back()->with('error', 'Error de configuración de pagos (Token faltante).');
        }

        try {
            SDK::setAccessToken($accessToken);
        } catch (\Throwable $e) {
            Log::error('MP SDK Error: ' . $e->getMessage());
            return back()->with('error', 'Error interno al conectar con pasarela.');
        }

        // Obtener carrito
        $cart  = $this->getOrCreateCart($userId);
        $items = $this->normalizeItems($cart);

        // Filtrar seleccionados
        $selected = array_values(array_filter($items, function ($it) {
            return !empty($it['escojido']) && ($it['product_id'] ?? 0) > 0 && ($it['quantity'] ?? 0) >= 1;
        }));

        if (empty($selected)) {
            return back()->with('error', 'No has seleccionado productos para pagar.');
        }

        // Cargar productos de DB
        $productIds = array_unique(array_column($selected, 'product_id'));
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        if ($products->isEmpty()) {
            return back()->with('error', 'Productos no encontrados.');
        }

        // Preparar datos para Pedido
        $subtotalCentavos = 0;
        $mpItems = [];
        $pedidoItemsData = []; // Para guardarlos luego

        $currency = 'COP';

        foreach ($selected as $it) {
            $pid = (int)$it['product_id'];
            $product = $products->get($pid);
            if (!$product) continue;

            $qty = max(1, (int)$it['quantity']);
            
            // Precio unitario: convertir float a centavos (si storea float)
            // Asumiendo que $product->price es float/string como "102.000"
            // Primero obtenemos float limpio
            $precioFloat = $this->mpMoney($product->price ?? 0);
            
            // Convertimos a centavos (x100)
            $precioCentavos = (int) round($precioFloat * 100);
            $totalLineaCentavos = $precioCentavos * $qty;

            $subtotalCentavos += $totalLineaCentavos;

            // MP Item
            $title = (string)($product->name ?? 'Producto');
            if (!empty($it['color'])) $title .= ' - ' . $it['color'];
            if (!empty($it['talla'])) $title .= ' - ' . $it['talla'];

            $mpItems[] = [
                'title'       => $title,
                'quantity'    => $qty,
                'unit_price'  => $precioFloat, // MP recibe float/decimal en moneda base
                'currency_id' => $currency,
            ];

            // Datos para PedidoItem
            $pedidoItemsData[] = [
                'product_id' => $pid,
                'color'      => $it['color'] ?? null,
                'talla'      => $it['talla'] ?? null,
                'cantidad'   => $qty,
                'precio_unitario_centavos' => $precioCentavos,
                'total_linea_centavos'     => $totalLineaCentavos,
            ];
        }

        if (empty($mpItems)) {
            return back()->with('error', 'Error procesando los productos.');
        }

        // Calcular envío (por ahora 0 o lógica propia)
        $envioCentavos = 0; 
        $totalCentavos = $subtotalCentavos + $envioCentavos;

        // Iniciar transacción DB para crear Pedido
        \Illuminate\Support\Facades\DB::beginTransaction();

        try {
            // 1. Crear Pedido
            $pedido = \App\Models\Pedido::create([
                'user_id'           => $userId,
                'estado'            => 'PENDIENTE_PAGO',
                'moneda'            => $currency,
                'subtotal_centavos' => $subtotalCentavos,
                'envio_centavos'    => $envioCentavos,
                'total_centavos'    => $totalCentavos,
                // Datos cliente (puedes tomarlos de Auth::user() o Request si hay form)
                'cliente_nombre'    => Auth::user()->name ?? 'Cliente',
                'cliente_email'     => Auth::user()->email ?? '',
                // 'cliente_telefono' => ...
                // 'direccion_envio'  => ...
            ]);

            // Generar External Reference con ID real
            // Formato: PED-{id}-{YYYYMMDDHHMMSS}
            $externalRef = 'PED-' . $pedido->id . '-' . now()->format('YmdHis');
            $pedido->external_reference = $externalRef;
            $pedido->save();

            // 2. Crear Items
            foreach ($pedidoItemsData as $itemData) {
                $pedido->items()->create($itemData);
            }

            \Illuminate\Support\Facades\DB::commit();

        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\DB::rollBack();
            Log::error('Error creando Pedido antes de MP: ' . $e->getMessage());
            return back()->with('error', 'Error al generar la orden de compra.');
        }

        // 3. Crear Preferencia MP
        try {
            $preference = new Preference();
            $preference->items = $mpItems;
            
            // Back URLs
            $preference->back_urls = [
                'success' => route('checkout.success'), // Usar route() es mas limpio si existe name
                'pending' => route('checkout.pending'),
                'failure' => route('checkout.failure'),
            ];
            
            // Auto return? User said: NO usar auto_return si causa problemas.
            // "NO usar auto_return si causa invalid_auto_return" -> Lo omito para seguridad.

            $preference->external_reference = $externalRef;
            
            // Webhook URL
            // Si APP_URL es accesible (prod o ngrok), MP lo llamará.
            if (config('app.env') === 'production' || str_contains(config('app.url'), 'ngrok')) {
                 $preference->notification_url = route('webhook.mercadopago');
            }

            $preference->save();

            if ($preference->id) {
                // 4. Guardar preferencia en Pedido
                $pedido->mp_preference_id = $preference->id;
                $pedido->save();

                // Redirigir
                $initPoint = $preference->init_point ?: $preference->sandbox_init_point;
                return redirect($initPoint);
            } else {
                Log::error('MP Error: Preferencia sin ID', ['pref' => $preference]);
                return back()->with('error', 'Error al comunicar con pasarela de pago.');
            }

        } catch (\Throwable $e) {
            Log::error('MP Preference Error: ' . $e->getMessage());
            // Opcional: Cancelar pedido o dejarlo como "abandonado" (PENDIENTE_PAGO sin preferencia)
            return back()->with('error', 'Ocurrió un error al iniciar el pago.');
        }
    }

    public function success(Request $request)
    {
        return $this->handleCallback($request, 'success');
    }

    public function pending(Request $request)
    {
        return $this->handleCallback($request, 'pending');
    }

    public function failure(Request $request)
    {
        return $this->handleCallback($request, 'failure');
    }

    protected function handleCallback(Request $request, $viewStatus)
    {
        $externalRef = $request->query('external_reference');
        $collectionId = $request->query('collection_id'); // o payment_id
        
        $pedido = null;
        if ($externalRef) {
            $pedido = \App\Models\Pedido::where('external_reference', $externalRef)->first();
        }

        return view("checkout.$viewStatus", [
            'data' => $request->all(),
            'pedido' => $pedido
        ]);
    }
}
