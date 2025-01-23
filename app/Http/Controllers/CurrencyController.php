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
}
