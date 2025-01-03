<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Services\NowPaymentsService;
use Illuminate\Http\Request;

class CryptoController extends Controller {

    protected $nowPayments;

    public function __construct(NowPaymentsService $nowPayments) {

        $this->nowPayments = $nowPayments;
    }

    public function createPayment($type) {

        $memberships = [
            'gold' => [
                'type' => 2,
                'price' => 1650,
                'currency' => 'USD',
            ],
            'platinum' => [
                'type' => 3,
                'price' => 5000,
                'currency' => 'USD',
            ],
        ];

        if (!isset($memberships[$type])) {
            return redirect()->route('membership.setting.view')->with('error', 'Invalid membership type.');
        }

        $membership = $memberships[$type];

        // Create payment record
        $payment = Payments::create([
            'user_id' => auth()->id(),
            'membership_type' => $type,
            'amount' => $membership['price'],
            'mode' => 'crypto',
            'payment_id' => uniqid('mcon_'),
            'status' => 'pending',
        ]);

        $paymentData = [
            'price_amount' => $membership['price'],
            'price_currency' => $membership['currency'],
            'pay_currency' => 'USDT', // Or any supported cryptocurrency
            'ipn_callback_url' => route('membership.callback'),
            'order_id' => $payment->payment_id,
            'order_description' => ucfirst($type) . " Membership",
        ];

        $nowPaymentResponse = $this->nowPayments->createPayment($paymentData['price_amount'], $paymentData['price_currency'], $paymentData['order_id'], $paymentData['ipn_callback_url']);

        if (isset($nowPaymentResponse['status']) && $nowPaymentResponse['status'] === 'success') {
            return redirect($nowPaymentResponse['invoice_url']); // Redirect user to NowPayments
        }

        return redirect()->route('membership.setting.view')->with('error', 'Unable to process payment.');
    }

    public function handleCallback(Request $request)
    {
        $paymentId = $request->input('payment_id');

        try {
            $paymentStatus = $this->nowPayments->getPaymentStatus($paymentId);

            $payment = Payments::where('payment_id', $paymentId)->firstOrFail();

            if ($paymentStatus['payment_status'] === 'finished') {
                $payment->update(['status' => 'completed']);

                // Update user membership
                $user = $payment->user; // Assuming Payment has a `user` relationship
                $type = $payment->membership_type;

                $membershipTypes = [
                    'gold' => 2,
                    'platinum' => 3,
                ];

                $user->memberships()->updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'type' => $membershipTypes[$type] ?? 0,
                        'status' => 'active',
                        'start_date' => now(),
                        'end_date' => now()->addYear(),
                    ]
                );

                return redirect()->route('membership.setting.view')->with('success', 'Payment successful. Welcome to ' . ucfirst($type) . ' Membership!');
            }

            $payment->update(['status' => 'failed']);
            return redirect()->route('membership.setting.view')->with('error', 'Payment not completed yet.');
        } catch (\Exception $e) {
            return redirect()->route('membership.setting.view')->with('error', $e->getMessage());
        }
    }
}
