<?php

if (!function_exists('currencySymbol')) {
    function currencySymbol($currencyCode)
    {
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'JPY' => '¥',
            'AUD' => 'A$',
            'CAD' => 'C$',
            'INR' => '₹',
            'NGN' => '₦',
            'CNY' => '¥',
            'BTC' => '₿',
            // Add more currency symbols as needed
        ];

        return $symbols[$currencyCode] ?? $currencyCode; // Default to currency code if symbol not found
    }
}

function formatPrice($amount) {

    $currencyService = app(\App\Services\CurrencyService::class);
    $converted = $currencyService->convert($amount, 'USD', session('currency', 'USD'));
    $currencySymbol = currencySymbol(session('currency', 'USD'));
    return $currencySymbol . number_format($converted, 2);
}
