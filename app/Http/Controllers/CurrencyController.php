<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyService $currencyService) {

        $this->currencyService = $currencyService;
    }

    public function changeCurrency(Request $request) {

        $request->validate(['currency' => 'required|string']);
        Session::put('currency', $request->currency);

        return back(); // Redirect to the previous page
    }

    public function convertSinglePrice(Request $request) {

        $price = $request->price;
        $fromCurrency = 'USD'; // Base currency
        $toCurrency = $request->currency;

        $convertedPrice = $this->currencyService->convert($price, $fromCurrency, $toCurrency);

        return response()->json([
            'convertedPrice' => number_format($convertedPrice, 2),
        ]);
    }

    public function convertPrices(Request $request) {

        $prices = $request->prices; // Array of prices
        $fromCurrency = 'USD'; // Base currency
        $toCurrency = $request->currency;

        $convertedPrices = [];
        $currencyService = app(\App\Services\CurrencyService::class);

        foreach ($prices as $price) {
            $convertedPrices[] = $currencyService->convert($price, $fromCurrency, $toCurrency);
        }

        return response()->json([
            'convertedPrices' => array_map(fn($price) => number_format($price, 2), $convertedPrices),
        ]);
    }


}
