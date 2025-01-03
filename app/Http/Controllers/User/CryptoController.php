<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\NowPaymentsService;
use Illuminate\Http\Request;

class CryptoController extends Controller {

    protected $nowPayments;

    public function __construct(NowPaymentsService $nowPayments)
    {
        $this->nowPayments = $nowPayments;
    }

    public function createPayment(Request $request)
    {
        $amount = $request->input('amount');
        $currency = 'USD'; // Convert amount to USD
        $orderId = uniqid('order_');
        $callbackUrl = route('crypto.payment.callback');

        try {
            $payment = $this->nowPayments->createPayment($amount, $currency, $orderId, $callbackUrl);
            return redirect($payment['invoice_url']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function handleCallback(Request $request)
    {
        $paymentId = $request->input('payment_id');

        try {
            $paymentStatus = $this->nowPayments->getPaymentStatus($paymentId);

            if ($paymentStatus['payment_status'] === 'finished') {
                // Handle successful payment (e.g., activate membership)
                return redirect()->route('membership.setting.view')->with('success', 'Payment successful!');
            }

            return redirect()->route('membership.setting.view')->with('error', 'Payment not completed yet.');
        } catch (\Exception $e) {
            return redirect()->route('membership.setting.view')->with('error', $e->getMessage());
        }
    }
}
