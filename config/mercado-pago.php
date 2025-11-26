<?php

return [
    /*
    |--------------------------------------------------------------------------
    | MERCADO PAGO Integration
    |--------------------------------------------------------------------------
    |
    | Credentials using in mercado pago integration
    | Get credentials in: https://www.mercadopago.com.br/developers/panel/credentials
    |
    */
    'public_key_sandbox' => env('MERCADO_PAGO_PUBLIC_KEY'),
    'access_token_sandbox' => env('MERCADO_PAGO_ACCESS_TOKEN'),
    'public_key' => env('MERCADO_PAGO_PUBLIC_KEY'),
    'access_token' => env('MERCADO_PAGO_ACCESS_TOKEN'),
    'mode' => env('MERCADO_PAGO_MODE')
];