<?php

namespace App\Services;

use App\Models\CurrencyRates;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    /**
     * Converts a given amount of money from one currency to another
     *
     * @param float $amount The amount of money to convert
     * @param string $fromCurrency The currency code of the original currency
     * @param string $toCurrency The currency code of the currency to convert to
     *
     * @throws \Exception If the exchange rate for the given currencies is not found
     *
     * @return float The converted amount of money
     */
    public function convert($amount, $fromCurrency, $toCurrency) {

        if ($fromCurrency === $toCurrency) {
            return $amount;
        }

        if ($amount === null) {
            throw new \Exception("Amount is null");
        }

        $fromRate = CurrencyRates::where('symbol', $fromCurrency)->value('exchange_rate');
        $toRate = CurrencyRates::where('symbol', $toCurrency)->value('exchange_rate');

        if ($fromRate === null || $toRate === null) {
            throw new \Exception("Exchange rate not found.");
        }

        return ($amount / $fromRate) * $toRate;
    }

}
