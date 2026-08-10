<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel Sanctum Minimal Config
    |--------------------------------------------------------------------------
    | This minimal config avoids referencing the Sanctum class when the
    | package is not installed. It provides safe defaults for local dev.
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', '127.0.0.1,localhost')),

    'expiration' => null,

    'prefix' => 'sanctum',

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => Illuminate\Cookie\Middleware\EncryptCookies::class,
    ],
];
