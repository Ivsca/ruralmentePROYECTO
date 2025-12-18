<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cloudinary\Configuration\Configuration;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     * Este método se usa para registrar servicios en el contenedor de Laravel.
     * En este caso NO se registra nada aquí porque Cloudinary
     * se inicializa directamente en el método boot().
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * 
     * Este método se ejecuta automáticamente cuando Laravel arranca.
     * Aquí se configura Cloudinary para toda la aplicación.
     */
    public function boot()
    {
        /**
         * ============================================================
         * CONFIGURACIÓN GLOBAL DE CLOUDINARY
         * ============================================================
         * 
         * IMPORTANTE:
         * - Todas las imágenes del proyecto se almacenan en CLOUDINARY
         * - En la BASE DE DATOS **NO** se guarda la imagen como archivo,
         *   solo se guarda la URL pública que devuelve Cloudinary.
         * 
         * Ejemplo de lo que se guarda en la BD:
         * ------------------------------------------------------------
         * https://res.cloudinary.com/tu_cloud_name/image/upload/archivo.jpg
         * ------------------------------------------------------------
         * 
         * Esa URL es la que se usa luego en <img src="..."> en las vistas.
         */

        Configuration::instance([

            /**
             * ------------------------------------------------------------
             * DATOS DE LA CUENTA DE CLOUDINARY
             * ------------------------------------------------------------
             * 
             * Estos valores SE LEEN DESDE EL ARCHIVO .env
             * 
             * .env (OBLIGATORIO):
             * CLOUDINARY_CLOUD_NAME=xxxx
             * CLOUDINARY_API_KEY=xxxx
             * CLOUDINARY_API_SECRET=xxxx
             * 
             * ❌ NUNCA escribir estos valores directamente aquí
             * ✅ Siempre usar variables de entorno (.env)
             */
            // nota: esos valores los puse en el archivo cloudinary.php por si no sabian como activar el entonor o les generaba errores a las
            // futuras personas que toquen este codigo y no sabian como acomodarlo

            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],

            /**
             * ------------------------------------------------------------
             * USO DE HTTPS (RECOMENDADO)
             * ------------------------------------------------------------
             * 
             * secure => true fuerza a que todas las URLs de las imágenes
             * se generen con HTTPS:
             * 
             * https://res.cloudinary.com/...
             * 
             * Esto evita problemas de:
             * - Contenido mixto (mixed content)
             * - Navegadores bloqueando imágenes
             * - Problemas en producción
             */
            'secure' => true
        ]);

        /**
         * ============================================================
         * SI HAY PROBLEMAS CON CLOUDINARY, REVISAR:
         * ============================================================
         * 
         * 1️⃣ Que el archivo .env tenga bien las variables:
         *     - CLOUDINARY_CLOUD_NAME
         *     - CLOUDINARY_API_KEY
         *     - CLOUDINARY_API_SECRET
         * 
         * 2️⃣ Que después de cambiar el .env se haya ejecutado:
         *     php artisan config:clear
         *     php artisan cache:clear
         * 
         * 3️⃣ NO mezclar esta configuración con:
         *     'url' => 'cloudinary://...'
         *     (eso causa errores foreach en PHP 8+)
         * 
         * 4️⃣ Verificar que el paquete de Cloudinary esté instalado:
         *     composer require cloudinary/cloudinary_php
         */

    }
}
