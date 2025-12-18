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
        'cloud_name' => 'dza9ptqqj',
        'api_key'    => '493792775544928',
        'api_secret' => 'CLOUDINARY_API_SECRET',
    ],

    /*
    |--------------------------------------------------------------------------
    | CLOUDINARY_URL (string) — the SDK reads this and the engine expects it
    |--------------------------------------------------------------------------
    |
    | IMPORTANT: This value must be a string (or var returning a string).
    | Don't set this to an array. Use the full CLOUDINARY_URL in your .
    |
    */

    'url' => 'cloudinary://493792775544928:FhTZ-B5StjFyWT59J-5MD1oLFZk@dza9ptqqj',

    /*
    |--------------------------------------------------------------------------
    | Optional: other defaults
    |--------------------------------------------------------------------------
    */

    'secure' => true,
];
