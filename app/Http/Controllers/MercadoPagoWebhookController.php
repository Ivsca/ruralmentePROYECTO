<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Pedido;
use MercadoPago\SDK;
use MercadoPago\Payment;

class MercadoPagoWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 1. Configurar SDK
        $accessToken = config('services.mercadopago.access_token');
        if (!$accessToken) {
            Log::error('Webhook MP: Access Token no configurado.');
            return response()->json(['status' => 'error', 'message' => 'Config err'], 500);
        }
        SDK::setAccessToken($accessToken);

        // 2. Obtener ID del pago desde el request
        // MercadoPago envía el ID en 'data.id' (v1) o a veces en 'id' dependiendo del topic.
        // Lo más seguro es buscar 'data.id' o 'id' en el query o body.
        
        $paymentId = $request->input('data.id') ?? $request->input('id');
        $type = $request->input('type'); // 'payment'

        // Si es solo una notificación de prueba o no es pago, respondemos 200 para que no reintente
        if (!$paymentId) { 
            // A veces llega topic=merchant_order. 
            // Si no hay payment ID, logueamos y 200.
            Log::info('Webhook MP: No payment ID found', $request->all());
            return response()->json(['status' => 'ok'], 200);
        }

        try {
            // 3. Consultar el pago en MercadoPago
            $payment = Payment::find_by_id($paymentId);
            
            if (!$payment) {
                Log::warning("Webhook MP: Payment no encontrado en MP: $paymentId");
                return response()->json(['status' => 'not_found'], 200); // 200 para que no reintente infinitamente
            }

            // 4. Leer external_reference
            $externalRef = $payment->external_reference;
            if (!$externalRef) {
                Log::warning("Webhook MP: Payment $paymentId sin external_reference");
                return response()->json(['status' => 'ok'], 200);
            }

            // 5. Buscar pedido
            $pedido = Pedido::where('external_reference', $externalRef)->first();

            if (!$pedido) {
                Log::error("Webhook MP: Pedido no encontrado para ref: $externalRef");
                return response()->json(['status' => 'order_not_found'], 200);
            }

            // 6. Idempotencia: Si ya tiene este pago registrado, no hacemos nada (o verificamos status)
            if ($pedido->mp_payment_id && $pedido->mp_payment_id == $paymentId) {
                // Ya procesado. Podríamos actualizar status si cambió, pero generalmente es el mismo flujo.
                // Verificamos si el estado cambió.
                if ($pedido->mp_status !== $payment->status) {
                     Log::info("Webhook MP: Actualizando estado pedido {$pedido->id} de {$pedido->mp_status} a {$payment->status}");
                } else {
                     Log::info("Webhook MP: Pedido {$pedido->id} ya tiene payment $paymentId procesado. Skipping.");
                     return response()->json(['status' => 'ok'], 200);
                }
            }
            
            // 7. Actualizar Pedido
            $pedido->mp_payment_id = $paymentId; 
            $pedido->mp_status = $payment->status;
            
            // Mapeo de estados a lógica de negocio
            // approved -> PAGADO
            // pending / in_process -> PENDIENTE_CONFIRMACION (o mantener PENDIENTE_PAGO si prefieres)
            // rejected / cancelled -> RECHAZADO

            switch ($payment->status) {
                case 'approved':
                    $pedido->estado = 'PAGADO';
                    break;
                case 'pending':
                case 'in_process':
                    $pedido->estado = 'PENDIENTE_CONFIRMACION';
                    break;
                case 'rejected':
                case 'cancelled':
                    $pedido->estado = 'RECHAZADO';
                    break;
                // 'refunded', 'charged_back' etc. podrían manejarse aquí
                default:
                    // Mantener estado actual o flaggear revisión
                    break;
            }

            $pedido->save();

            Log::info("Webhook MP: Pedido {$pedido->id} actualizado/verificado. Status MP: {$payment->status}. Estado Pedido: {$pedido->estado}");

            return response()->json(['status' => 'ok'], 200);

        } catch (\Throwable $e) {
            Log::error('Webhook MP Error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            // Retornamos 500 solo si es un error que valga la pena reintentar (timeout, DB connection). 
            // Si es lógica, mejor 200 para borrar de cola de MP.
            return response()->json(['status' => 'error'], 500);
        }
    }
}
