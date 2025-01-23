<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validCurrencies = ['USD', 'EUR', 'GBP', 'NGN']; // Add more currencies as needed

        if (!$request->session()->has('currency') || !in_array($request->session()->get('currency'), $validCurrencies)) {
            $request->session()->put('currency', 'USD'); // Default to USD
        }

        // Pass the selected currency to the view
        view()->share('selectedCurrency', session('currency'));
        
        return $next($request);
    }
}
