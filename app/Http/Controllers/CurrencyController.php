<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    protected $currencyService;

    // Dependency Injection for CurrencyService
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    /**
     * Change the session currency.
     */
    public function changeCurrency(Request $request)
    {
        $request->validate(['currency' => 'required|string']);

        // Store the selected currency in the session
        $currency = $request->currency;
        Session::put('currency', $currency);

        return back(); // Redirect to the previous page
    }

    /**
     * Convert a single price to the selected currency.
     */
    public function convertSinglePrice(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'currency' => 'required|string'
        ]);

        $price = $request->price;
        $fromCurrency = 'USD'; // Base currency
        $toCurrency = $request->currency;

        // Convert the price using the CurrencyService
        $convertedPrice = $this->currencyService->convert($price, $fromCurrency, $toCurrency);

        return response()->json([
            'convertedPrice' => number_format($convertedPrice, 2),
        ]);
    }

    /**
     * Convert an array of prices to the selected currency.
     */
    public function convertPrices(Request $request) {
        
        $request->validate([
            'prices' => 'required|array',
            'currency' => 'required|string'
        ]);

        $prices = $request->prices; // Array of prices
        $fromCurrency = 'USD'; // Base currency
        $toCurrency = $request->currency;

        $convertedPrices = [];

        // Iterate over each price and convert it
        foreach ($prices as $price) {
            $convertedPrices[] = $this->currencyService->convert($price, $fromCurrency, $toCurrency);
        }

        return response()->json([
            'convertedPrices' => array_map(fn($price) => number_format($price, 2), $convertedPrices),
        ]);
    }
}
