<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudinary credentials from .env
    |--------------------------------------------------------------------------
    |
    | The package expects a CLOUDINARY_URL env var (cloudinary://key:secret@name)
    | but we keep the explicit fields too for convenience.
    |
    */

    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key'    => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ],

    /*
    |--------------------------------------------------------------------------
    | CLOUDINARY_URL (string) — the SDK reads this and the engine expects it
    |--------------------------------------------------------------------------
    |
    | IMPORTANT: This value must be a string (or env var returning a string).
    | Don't set this to an array. Use the full CLOUDINARY_URL in your .env.
    |
    */

    'url' => env('CLOUDINARY_URL'),

    /*
    |--------------------------------------------------------------------------
    | Optional: other defaults
    |--------------------------------------------------------------------------
    */

    'secure' => true,
];
