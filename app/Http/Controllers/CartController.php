<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TablaCarrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


// mueve tu cuerpo alegria macarena
// tu cuerpo es para darle alegria
// y cosa buena

// si con esto no funciona no se que mas hacer

class CartController extends Controller
{
    protected function getOrCreateCart(int $userId): TablaCarrito
    {
        return TablaCarrito::firstOrCreate(
            ['id_user' => $userId],
            ['productosYcantidad_ids' => [], 'CantidadProductos' => 0, 'seleccionado' => true]
        );
    }


    /**
     * Normaliza y garantiza el campo 'escojido' (default true)
     */
    protected function normalizeItems($cart)
    {
        $raw = $cart->productosYcantidad_ids;
        if (is_string($raw)) {
        $items = json_decode($raw, true);
        if (!is_array($items)) $items = [];
        } else if (is_array($raw)) {
        $items = $raw;
        } else {
        $items = [];
        }
        foreach ($items as &$it) {
        $it['product_id'] = (int)($it['product_id'] ?? 0);
        $it['quantity'] = (int)($it['quantity'] ?? 0);
        $it['color'] = trim((string)($it['color'] ?? ''));
        $it['escojido'] = isset($it['escojido']) ? (bool)$it['escojido'] : true;
        }
        return $items;
        }

        protected function findIndexByProductAndColor(array $items, int $productId, ?string $color)
        {
        $color = (string)($color ?? '');
        $colorNorm = mb_strtolower(trim($color));
        $emptyVariants = ['', 'sin color', 'sin-color', 'none', 'n/a', 'null'];
        if (in_array($colorNorm, $emptyVariants, true)) $colorNorm = '';


        foreach ($items as $idx => $it) {
        $itColor = (string)($it['color'] ?? '');
        $itPid = (int)($it['product_id'] ?? 0);
        $itColorNorm = mb_strtolower(trim($itColor));
        if (in_array($itColorNorm, $emptyVariants, true)) $itColorNorm = '';
        if ($itPid === $productId && $itColorNorm === $colorNorm) return $idx;
        }
        return null;
    }

    /**
     * Mostrar carrito (todos los productos)
     */
    public function ver()
    {
        $user = Auth::id();
        if (!$user) return redirect()->route('login');

        $cart = $this->getOrCreateCart($user);
        $items = $this->normalizeItems($cart);

        if (empty($items)) {
            return view('products.ver-productos-carrito', [
                'cartItems' => [],
                // devolvemos string formateado desde el backend
                'subtotal'  => number_format(0, 2, '.', ','),
                'cart'      => $cart
            ]);
        }

        $productIds = array_unique(array_map(fn($i) => (int)$i['product_id'], $items));

        $products = $productIds
            ? Product::whereIn('id', $productIds)->get()->keyBy('id')
            : collect();

        $cartItems = [];

        foreach ($items as $entry) {
            $pid = (int) ($entry['product_id'] ?? 0);
            if (!isset($products[$pid])) continue;

            $qty = (int)($entry['quantity'] ?? 0);
            $price = $products[$pid]->price ?? 0;
            $lineTotalNumeric = $price * $qty;

            $cartItems[] = (object)[
                'product'    => $products[$pid],
                'quantity'   => $qty,
                'color'      => $entry['color'] ?? '',
                'escojido'   => array_key_exists('escojido', $entry) ? (bool)$entry['escojido'] : true,
                // line_total formateado como string
                'line_total' => number_format($lineTotalNumeric, 2, '.', ','),
            ];
        }

        // Subtotal formateado por el backend (string)
        $subtotal = $this->subtotal($cartItems);

        return view('products.ver-productos-carrito', [
            'cartItems' => $cartItems,
            'subtotal'  => $subtotal,
            'cart'      => $cart
        ]);
    }

    /**
     * Subtotal SOLO de los productos escojidos = true
     * Devuelve string formateado, por ejemplo "21,530.00"
     */
    public function subtotal(array $cartItems)
    {
        $sum = 0.0;

        foreach ($cartItems as $item) {
            if (!empty($item->escojido)) {
                $price = (float)($item->product->price ?? 0);
                $sum += ($price * (float)$item->quantity);
            }
        }

        return number_format((float)$sum, 2, '.', ',');
    }






    public function add(Request $r, int $id)
    {
        $userId = Auth::id();
        if (!$userId) {
            return $r->wantsJson() || $r->ajax()
                ? response()->json(['ok' => false, 'message' => 'Debes iniciar sesión.'], 401)
                : redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $product = Product::findOrFail($id);

        $v = Validator::make($r->all(), [
            'color' => 'nullable|string|max:100',
            'talla' => 'nullable|string|max:10',
            'quantity' => 'nullable|integer|min:1'
        ]);

        if ($v->fails()) {
            return $r->wantsJson() || $r->ajax()
                ? response()->json(['ok' => false, 'errors' => $v->errors()], 422)
                : back()->withErrors($v)->withInput();
        }

        $qty   = max(1, (int)$r->input('quantity', 1));
        $color = trim((string)$r->input('color', ''));
        $talla = trim((string)$r->input('talla', ''));

        if (($product->stock ?? 0) < $qty) {
            $msg = 'No hay suficiente stock.';
            return $r->wantsJson() || $r->ajax()
                ? response()->json(['ok' => false, 'message' => $msg], 409)
                : back()->with('error', $msg);
        }

        // validate color
        $productColors = $product->colors ?? [];
        if ($color !== '' && !in_array($color, $productColors, true)) {
            $msg = 'Color inválido.';
            return $r->wantsJson() || $r->ajax()
                ? response()->json(['ok' => false, 'message' => $msg], 422)
                : back()->with('error', $msg)->withInput();
        }

        $isShirt = strcasecmp($product->category ?? '', 'camisas') === 0;
        if ($isShirt) {
            $allowedSizes = ['S','M','L','XL'];
            if ($talla === '') {
                $msg = 'Selecciona una talla.';
                return $r->wantsJson() || $r->ajax()
                    ? response()->json(['ok' => false, 'message' => $msg], 422)
                    : back()->with('error', $msg)->withInput();
            }
            if (!in_array(strtoupper($talla), $allowedSizes, true)) {
                $msg = 'Talla inválida.';
                return $r->wantsJson() || $r->ajax()
                    ? response()->json(['ok' => false, 'message' => $msg], 422)
                    : back()->with('error', $msg)->withInput();
            }
            $talla = strtoupper($talla);
        } else {
            $talla = null;
        }

        try {
            DB::transaction(function () use ($userId, $product, $id, $qty, $color, $talla) {
                $cart = TablaCarrito::firstOrCreate(
                    ['id_user' => $userId],
                    ['productosYcantidad_ids' => [], 'CantidadProductos' => 0, 'seleccionado' => true]
                );

                $items = $cart->productosYcantidad_ids ?? [];

                $foundIndex = null;
                foreach ($items as $index => $it) {
                    if (
                        (int)$it['product_id'] === (int)$id &&
                        ($it['color'] ?? '') === $color &&
                        ($it['talla'] ?? null) === $talla
                    ) {
                        $foundIndex = $index;
                        break;
                    }
                }

                if ($foundIndex !== null) {
                    $items[$foundIndex]['quantity'] = (int)$items[$foundIndex]['quantity'] + $qty;
                    if (!array_key_exists('escojido', $items[$foundIndex])) {
                        $items[$foundIndex]['escojido'] = true;
                    }
                } else {
                    $entry = [
                        'product_id' => (int)$id,
                        'quantity' => (int)$qty,
                        'escojido' => true,
                        'price' => $product->price,
                    ];
                    if ($color !== '') $entry['color'] = $color;
                    if ($talla !== null) $entry['talla'] = $talla;
                    $items[] = $entry;
                }

                $cart->productosYcantidad_ids = $items;
                $cart->CantidadProductos = $this->recalcTotals($items);
                $cart->save();
            });

            $cart = TablaCarrito::where('id_user', $userId)->first();

        } catch (\Throwable $e) {
            Log::error('Add to cart error: ' . $e->getMessage(), [
                'user_id' => $userId, 'product_id' => $id, 'exception' => $e
            ]);

            return $r->wantsJson() || $r->ajax()
                ? response()->json(['ok' => false, 'message' => 'Error al agregar al carrito.'], 500)
                : back()->with('error', 'Error al agregar al carrito.');
        }

        if ($r->wantsJson() || $r->ajax()) {
            return response()->json(['ok' => true, 'count' => $cart->CantidadProductos ?? 0]);
        }

        return back()->with('success', 'Producto agregado al carrito ✔');
    }

    protected function recalcTotals(array $items): int
    {
        return array_sum(array_map(fn($i) => (int)($i['quantity'] ?? 0), $items));
    }

    /**
     * Actualizar cantidad (product + color)
     */
    public function update(Request $r)
    {
        $v = Validator::make($r->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'color' => 'nullable|string|max:100',
            'quantity' => 'required|integer|min:0'
        ]);

        if ($v->fails()) {
            return response()->json(['ok' => false, 'errors' => $v->errors()], 422);
        }

        $user = Auth::id();
        if (!$user) return response()->json(['ok' => false], 401);

        $pid = (int)$r->product_id;
        $color = trim((string)($r->color ?? ''));
        $qty = (int)$r->quantity;

        $cart = $this->getOrCreateCart($user);
        $items = $this->normalizeItems($cart);

        $idx = $this->findIndexByProductAndColor($items, $pid, $color);

        if ($idx === null) return response()->json(['ok' => false, 'msg' => 'Entrada no encontrada'], 404);

        if ($qty <= 0) {
            array_splice($items, $idx, 1);
        } else {
            $items[$idx]['quantity'] = $qty;
        }

        $cart->productosYcantidad_ids = $items;
        $cart->CantidadProductos = $this->recalcTotals($items);
        $cart->save();

        // recalcular subtotal
        $productIds = array_map(fn($i) => (int)$i['product_id'], $items);
        $subtotal = Product::whereIn('id', $productIds)->get()->sum(function ($p) use ($items) {
            $sumQty = 0;
            foreach ($items as $en) {
                if ((int)$en['product_id'] === $p->id) $sumQty += (int)$en['quantity'];
            }
            return $sumQty * ($p->price ?? 0);
        });

        return response()->json([
            'ok' => true,
            'count' => $cart->CantidadProductos,
            'subtotal' => $subtotal
        ]);
    }

    /**
     * Toggle selected (escojido) via AJAX
     */
    public function toggleSelected(Request $r)
    {
        $v = Validator::make($r->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'color' => 'nullable|string|max:100',
            'selected' => 'required|boolean'
        ]);
        if ($v->fails()) {
            return response()->json(['ok' => false, 'errors' => $v->errors()], 422);
        }
        if (!Auth::check()) {
            return response()->json(['ok' => false, 'message' => 'No autorizado'], 401);
        }


        $userId = Auth::id();
        $productId = (int)$r->input('product_id');
        $color = trim((string)$r->input('color', ''));
        $colorLower = mb_strtolower($color);
        if (in_array($colorLower, ['', 'sin color', 'sin-color', 'none', 'n/a'], true)) $color = '';
        $selected = (bool)$r->input('selected', true);


        try {
        DB::transaction(function () use ($userId, $productId, $color, $selected, &$cart, &$selectedCount, &$subtotalSelected) {
        $cart = $this->getOrCreateCart($userId);
        $items = $this->normalizeItems($cart);


        $idx = $this->findIndexByProductAndColor($items, $productId, $color);
        if ($idx === null) throw new \RuntimeException('entry_not_found');


        $items[$idx]['escojido'] = $selected;
        $cart->productosYcantidad_ids = $items;
        $cart->CantidadProductos = $this->recalcTotals($items);
        $cart->save();


        $selectedCount = 0;
        $subtotalSelected = 0;
        $productIds = array_unique(array_map(fn($i) => (int)$i['product_id'], $items));
        $products = $productIds ? Product::whereIn('id', $productIds)->get()->keyBy('id') : collect();


        foreach ($items as $it) {
        if (!empty($it['escojido'])) {
        $qty = (int)($it['quantity'] ?? 0);
        $pid = (int)($it['product_id'] ?? 0);
        $price = isset($products[$pid]) ? ($products[$pid]->price ?? 0) : 0;
        $selectedCount += $qty;
        $subtotalSelected += $price * $qty;
        }
        }
        });
        } catch (\Throwable $e) {
        if ($e instanceof \RuntimeException && $e->getMessage() === 'entry_not_found') {
        return response()->json(['ok' => false, 'message' => 'Entrada no encontrada en carrito'], 404);
        }
        Log::error('toggleSelected error: ' . $e->getMessage(), [
        'user_id' => $userId,
        'product_id' => $productId,
        'color' => $color,
        'exception' => $e
        ]);
        if (config('app.debug')) {
        return response()->json(['ok' => false, 'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()], 500);
        }
        return response()->json(['ok' => false, 'message' => 'Error interno al actualizar selección'], 500);
        }


        return response()->json([
        'ok' => true,
        'count' => $cart->CantidadProductos ?? 0,
        'selected_count' => $selectedCount ?? 0,
        'subtotal_selected' => $subtotalSelected ?? 0
        ]);
        }


    /**
     * Eliminar entrada (product + color)
     */
    public function remove(Request $r)
    {
        $v = Validator::make($r->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'color'      => 'nullable|string|max:100'
        ]);
        if ($v->fails()) return response()->json(['ok' => false], 422);

        $user = Auth::id();
        if (!$user) return response()->json(['ok' => false], 401);

        $pid = (int)$r->product_id;
        $color = trim((string)($r->color ?? ''));

        $cart = $this->getOrCreateCart($user);
        $items = $this->normalizeItems($cart);

        $idx = $this->findIndexByProductAndColor($items, $pid, $color);
        if ($idx === null) {
            return response()->json(['ok' => false, 'msg' => 'Entrada no encontrada'], 404);
        }

        array_splice($items, $idx, 1);

        $cart->productosYcantidad_ids = $items;
        $cart->CantidadProductos = $this->recalcTotals($items);
        $cart->save();

        return response()->json([
            'ok'    => true,
            'count' => $cart->CantidadProductos
        ]);
    }


    /**
     * Vaciar carrito
     */
    public function clear()
    {
        $user = Auth::id();
        if (!$user) return response()->json(['ok' => false], 401);

        $cart = $this->getOrCreateCart($user);

        $cart->productosYcantidad_ids = [];
        $cart->CantidadProductos = 0;
        $cart->save();

        return response()->json(['ok' => true]);
    }

    /**
     * Cantidad total
     */
    public function cantidad($id)
{
    // seguridad: solo el dueño puede pedir su carrito
    if (!auth()->check() || auth()->id() != $id) {
        return response()->json(['cantidad' => 0]);
    }

    $cart = $this->getOrCreateCart($id);
    if (!$cart) {
        return response()->json(['cantidad' => 0]);
    }

    // campos que intentaremos leer (orden importante: tu campo principal primero)
    $fieldsToTry = [
        'CantidadProductos', 'items', 'productos', 'contenido', 'cart', 'data', 'items_json', 'productos_json'
    ];

    // recolección de debug para entender por qué falló si devuelve 0
    $debug = [
        'found' => [],
        'tried_attributes' => [],
    ];

    // 1) chequea explícitamente los campos comunes (evita accessors con side-effects)
    $attrs = $cart->getAttributes();
    foreach ($fieldsToTry as $f) {
        if (array_key_exists($f, $attrs)) {
            $raw = $attrs[$f];
            $debug['tried_attributes'][$f] = $this->shortPreview($raw);
            $count = $this->tryCountFromRaw($raw);
            if ($count !== null) {
                return response()->json(['cantidad' => $count]);
            }
            $debug['found'][$f] = ['raw_preview' => $this->shortPreview($raw), 'count' => null];
        }
        // intenta también como propiedad (accessor)
        if (isset($cart->$f)) {
            $raw = $cart->$f;
            // evitar duplicar entrada si ya chequeamos en attrs
            if (!array_key_exists($f, $debug['tried_attributes'])) {
                $debug['tried_attributes'][$f] = $this->shortPreview($raw);
            }
            $count = $this->tryCountFromRaw($raw);
            if ($count !== null) {
                return response()->json(['cantidad' => $count]);
            }
        }
    }

    // 2) intenta con getOriginal (valor sin mutación/accessors)
    foreach ($fieldsToTry as $f) {
        try {
            $orig = $cart->getOriginal($f);
            if (!is_null($orig)) {
                $debug['tried_attributes']["original:$f"] = $this->shortPreview($orig);
                $count = $this->tryCountFromRaw($orig);
                if ($count !== null) {
                    return response()->json(['cantidad' => $count]);
                }
            }
        } catch (\Throwable $e) {
            // ignora si no existe getOriginal para este campo
        }
    }

    // 3) fallback: inspecciona todos los atributos del modelo (por si el campo tiene otro nombre)
    foreach ($attrs as $k => $v) {
        // ya chequeados arriba se saltan
        if (array_key_exists($k, $debug['tried_attributes'])) {
            continue;
        }
        $debug['tried_attributes'][$k] = $this->shortPreview($v);
        $count = $this->tryCountFromRaw($v);
        if ($count !== null) {
            return response()->json(['cantidad' => $count]);
        }
    }

    // 4) relaciones "items" cargadas
    if ($cart->relationLoaded('items')) {
        $items = $cart->getRelation('items');
        if ($items instanceof \Illuminate\Support\Collection) {
            return response()->json(['cantidad' => $items->count()]);
        }
    }

    // 5) relación "items" como fallback (contador en BD)
    if (method_exists($cart, 'items')) {
        try {
            $relation = $cart->items();
            if ($relation instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
                return response()->json(['cantidad' => (int)$relation->count()]);
            }
        } catch (\Throwable $e) {
            // ignore
        }
    }

    // Si llegamos aquí: no detectamos una lista válida.
    // Devolvemos 0 y DEBUG para que puedas ver qué se intentó.
    return response()->json([
        'cantidad' => 0,
        'debug' => $debug
    ]);
}

    /**
     * Intenta contar a partir de "raw" intentando varios arreglos de parsing.
     * Retorna int si logra contar o null si no reconoce formato.
     */
    protected function tryCountFromRaw($raw)
    {
        // Collections/arrays/Arrayable
        if ($raw instanceof \Illuminate\Support\Collection) {
            return $raw->count();
        }
        if ($raw instanceof \Illuminate\Contracts\Support\Arrayable) {
            $arr = $raw->toArray();
            return is_array($arr) ? count($arr) : null;
        }
        if (is_array($raw)) {
            return count($raw);
        }

        // Si es null o vacío no lo consideramos válido aquí
        if (is_null($raw)) {
            return null;
        }

        // Si es entero: probablemente ya sea un contador (pero el usuario pide contar elementos, no usar este int)
        // No asumimos que un int es el conteo correcto — lo ignoramos porque queremos contar elementos en una lista.
        if (is_int($raw) || (is_string($raw) && ctype_digit($raw))) {
            // si quieres usar un int directo, descomenta la línea de abajo:
            // return (int)$raw;
            return null;
        }

        // Strings: intentos progresivos
        if (is_string($raw)) {
            $s = trim($raw);
            if ($s === '') return null;

            // 1) Intento directo JSON
            $decoded = @json_decode($s, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return count($decoded);
            }

            // 2) Si la string está entre comillas extra (double-encoded) -> decodificamos repetidamente hasta que no sea string
            $attempt = $s;
            for ($i = 0; $i < 4; $i++) {
                $d = @json_decode($attempt, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    if (is_array($d)) return count($d);
                    if (is_string($d)) {
                        $attempt = $d;
                        continue;
                    }
                    // si es otra cosa, salimos
                    break;
                }
                // si falla, intentamos "un-escape" y volver a intentar
                $attempt = stripslashes($attempt);
                // eliminar posibles comillas alrededor
                if ((substr($attempt, 0, 1) === '"' && substr($attempt, -1) === '"') ||
                    (substr($attempt, 0, 1) === "'" && substr($attempt, -1) === "'")) {
                    $attempt = substr($attempt, 1, -1);
                }
                // rehacer otro intento en el siguiente loop
            }

            // 3) si el JSON falló por comas finales u otros problemas: intentamos limpiar JSON simple
            $clean = $this->fixCommonJsonIssues($s);
            $decoded2 = @json_decode($clean, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded2)) {
                return count($decoded2);
            }

            // 4) serialized PHP?
            if (strpos($s, 'a:') === 0 || strpos($s, 'O:') === 0 || strpos($s, 's:') === 0) {
                $un = @unserialize($s);
                if ($un !== false && is_array($un)) {
                    return count($un);
                }
            }

            // 5) fallback conservador: buscar ocurrencias de "product_id" — construir pequeños matches
            if (stripos($s, 'product_id') !== false) {
                // simple heuristic: contar llaves de objetos con product_id
                preg_match_all('/"product_id"\s*:/i', $s, $matches);
                if (!empty($matches[0])) {
                    return count($matches[0]);
                }
            }
        }

        return null;
    }

    /** preview seguro y corto del valor para debug */
    protected function shortPreview($v, $max = 200)
    {
        if (is_null($v)) return null;
        if (is_array($v)) return 'array[' . count($v) . ']';
        if ($v instanceof \Illuminate\Support\Collection) return 'Collection[' . $v->count() . ']';
        $s = (string)$v;
        if (strlen($s) <= $max) return $s;
        return substr($s, 0, $max) . '...';
    }

    /** intenta arreglar problemas comunes en JSON (comas finales, control chars) */
    protected function fixCommonJsonIssues(string $s)
    {
        // elimina caracteres de control no imprimibles
        $s = preg_replace('/[[:cntrl:]]+/', '', $s);
        // quitar comas finales antes de ] o }
        $s = preg_replace('/,(\s*[\]}])/', '$1', $s);
        // reemplazar comillas simples por dobles cuando sea probable
        // (cuidado: heurístico, no perfecto)
        if (strpos($s, "'") !== false && strpos($s, '"') === false) {
            $s = str_replace("'", '"', $s);
        }
        return $s;
    }

}
