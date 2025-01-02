<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Paystack Public Key
    |--------------------------------------------------------------------------
    |
    | The public key from your Paystack Dashboard
    |
    */
    'publicKey' => env('PAYSTACK_PUBLIC_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Paystack Secret Key
    |--------------------------------------------------------------------------
    |
    | The secret key from your Paystack Dashboard
    |
    */
    'secretKey' => env('PAYSTACK_SECRET_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Paystack Payment URL
    |--------------------------------------------------------------------------
    |
    | This is the base URL used to interact with Paystack's API.
    | Do not modify unless Paystack specifies otherwise.
    |
    */
    'paymentUrl' => env('PAYSTACK_PAYMENT_URL', 'https://api.paystack.co'),

    /*
    |--------------------------------------------------------------------------
    | Paystack Merchant Email
    |--------------------------------------------------------------------------
    |
    | This is the merchant email from your Paystack Dashboard.
    |
    */
    'merchantEmail' => env('MERCHANT_EMAIL'),

    /*
    |--------------------------------------------------------------------------
    | Paystack SSL Verification
    |--------------------------------------------------------------------------
    |
    | This determines if the communication with Paystack's api is securely encrypted.
    |
    */
    'guzzle' => [
        'verify' => false, // Disable SSL verification
    ],
];
