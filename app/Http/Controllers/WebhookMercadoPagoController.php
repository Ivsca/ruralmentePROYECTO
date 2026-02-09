<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookMercadoPagoController extends Controller
{
    public function handle(Request $request)
    {
        try {
            // Log básico para debug
            Log::info('MP Webhook recibido', [
                'query' => $request->query(),
                'body'  => $request->all(),
            ]);

            $type = $request->query('type') ?? $request->input('type');
            $dataId = $request->input('data.id') ?? $request->query('data.id');

            // Algunas variantes envían ?id=... o action/data.id
            $paymentId = $dataId ?? $request->query('id') ?? $request->input('id');

            if (!$paymentId) {
                return response()->json(['ok' => true, 'ignored' => 'no_payment_id'], 200);
            }

            // Solo si es evento de payment (dependiendo del webhook)
            // Igual puedes omitir esto y consultar siempre el pago.
            // if ($type && $type !== 'payment') return response()->json(['ok'=>true,'ignored'=>'type'],200);

            // Config token
            $accessToken = trim((string) config('services.mercadopago.access_token', ''));
            if ($accessToken === '') {
                Log::warning('MP webhook: access token vacío');
                return response()->json(['ok' => true], 200);
            }

            \MercadoPago\SDK::setAccessToken($accessToken);

            // Consultar pago real en MP
            $payment = \MercadoPago\Payment::find_by_id($paymentId);

            if (!$payment) {
                Log::warning('MP webhook: payment no encontrado', ['payment_id' => $paymentId]);
                return response()->json(['ok' => true], 200);
            }

            Log::info('MP payment fetched', [
                'payment_id' => $paymentId,
                'status' => $payment->status ?? null,
                'status_detail' => $payment->status_detail ?? null,
                'external_reference' => $payment->external_reference ?? null,
                'transaction_amount' => $payment->transaction_amount ?? null,
                'payer_email' => $payment->payer->email ?? null,
            ]);

            /**
             * AQUÍ: actualizar tu pedido en BD con:
             * - external_reference
             * - status: approved / pending / rejected / cancelled etc.
             * - payment_id
             */

            return response()->json(['ok' => true], 200);

        } catch (\Throwable $e) {
            Log::error('MP webhook error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            // MP reintenta si no es 200. Si quieres reintentos, devuelve 500.
            // Si prefieres no reintentos, devuelve 200.
            return response()->json(['ok' => true], 200);
        }
    }
}
