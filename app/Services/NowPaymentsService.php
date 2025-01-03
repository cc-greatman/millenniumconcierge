<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NowPaymentsService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('NOWPAYMENTS_API_KEY');
    }

    // Create a payment
    public function createPayment($amount, $currency, $orderId, $callbackUrl) {

        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
            'Content-Type' => 'application/json'
        ])->post('https://api.nowpayments.io/v1/invoice', [
            'price_amount' => $amount,
            'price_currency' => $currency,
            'pay_currency' => 'BTC', // or any cryptocurrency
            'order_id' => $orderId,
            'ipn_callback_url' => $callbackUrl,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('NowPayments API error: ' . $response->body());
    }

    // Get payment status
    public function getPaymentStatus($paymentId) {

        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
        ])->get("https://api.nowpayments.io/v1/payment/{$paymentId}");

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('NowPayments API error: ' . $response->body());
    }
}
