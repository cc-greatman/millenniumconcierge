<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyService
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct() {
        
        $this->apiUrl = 'https://v6.exchangerate-api.com/v6'; // Example API
        $this->apiKey = env('CURRENCY_API_KEY'); // Store in .env
    }

    public function getRates($base = 'USD') {

        $response = Http::get("{$this->apiUrl}/latest/{$base}", [
            'apiKey' => $this->apiKey,
        ]);

        return $response->successful() ? $response->json()['conversion_rates'] : [];
    }

    public function convert($amount, $from, $to) {

        $rates = $this->getRates($from);

        if (isset($rates[$to])) {
            return $amount * $rates[$to];
        }

        return $amount; // Fallback to the original amount
    }

}
