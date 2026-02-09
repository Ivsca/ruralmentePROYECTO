# Configuración Mercado Pago Checkout Pro (Laravel)

## 1. Variables de Entorno (.env)
Asegúrate de configurar las siguientes variables en tu archivo `.env`:

```env
MP_ACCESS_TOKEN=TU_ACCESS_TOKEN_DE_PRODUCCION_O_PRUEBA
MP_PUBLIC_KEY=TU_PUBLIC_KEY_(OPCIONAL)
APP_URL=https://tu-dominio.com
```

**Para pruebas locales con Ngrok:**
```env
APP_URL=https://xxxx-xxxx-xxxx.ngrok-free.app
```
*(Recuerda reiniciar el servidor o limpiar caché: `php artisan config:clear`)*

## 2. Webhook (IPN)
La ruta del webhook es:
`POST /mercadopago/webhook`

Si usas Ngrok, la URL para configurar en el Dashboard de MP (si fuera necesario manual) o la que se envía automáticamente en checkout es:
`https://xxxx.ngrok.io/mercadopago/webhook`

**Importante:**
- El webhook valida el pago consultando directamente a Mercado Pago.
- NO confíes solo en la redirección al sitio web ("back_urls").
- El webhook actualiza el estado del `Pedido` en base de datos.

## 3. Checklist de Pruebas

### A) Prueba de Pago Aprobado
1. [ ] Configura `MP_ACCESS_TOKEN` de prueba (sandbox).
2. [ ] Inicia checkout con tarjetas de prueba de MP (e.g., Visa terminada en 1111).
3. [ ] Verifica que redirige a `/checkout/success`.
4. [ ] Verifica en BD que `Pedido` tenga estado `PAGADO` (o `PENDIENTE_CONFIRMACION` si tarda).
5. [ ] **Verifica que llegue el Webhook**: Revisa `storage/logs/laravel.log`. Debería decir "Webhook MP: Pedido X actualizado".

### B) Prueba de Pago Pendiente (Efectivo/Ticket)
1. [ ] Selecciona pago en Efecty/Vía Baloto en el checkout de MP.
2. [ ] Redirige a `/checkout/pending`.
3. [ ] Verifica en BD estado `PENDIENTE_PAGO` o `PENDIENTE_CONFIRMACION`.

### C) Prueba de Pago Rechazado
1. [ ] Usa tarjeta de prueba para rechazo (e.g. visa terminada en letrero de error).
2. [ ] Redirige a `/checkout/failure`.
3. [ ] Verifica mensaje de error en la vista.

### D) Webhook e Idempotencia
1. [ ] Si el webhook llega 2 veces (común en MP), verifica en logs que la segunda vez diga "Skipping" o no duplique acciones.
2. [ ] Verifica que `mp_payment_id` sea único en la tabla `pedidos`.

### E) Cierre de Ventana
1. [ ] Paga en MP pero cierra la pestaña antes de volver a la tienda.
2. [ ] Espera unos segundos/minutos.
3. [ ] Verifica que el Webhook actualice el estado del pedido a `PAGADO` en la BD sin necesidad de que el usuario vuelva.

## 4. Archivos Modificados/Creados
- **Migración**: `database/migrations/2026_02_08_234814_add_mercadopago_fields_to_pedidos_table.php`
- **Modelo**: `app/Models/Pedido.php` (fillable updated)
- **Controller Checkout**: `app/Http/Controllers/CheckoutController.php` (lógica `iniciar` y callbacks)
- **Controller Webhook**: `app/Http/Controllers/MercadoPagoWebhookController.php` (Nuevo)
- **Rutas**: `routes/web.php`
- **Middleware**: `app/Http/Middleware/VerifyCsrfToken.php` (Excepción CSRF)
- **Vistas**: `resources/views/checkout/` (success, pending, failure)
