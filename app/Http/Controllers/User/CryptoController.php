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
            'society' => [
                'type' => 3,
                'price' => 3000,
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
            'membership_type' => $membership['type'],
            'amount' => $membership['price'],
            'mode' => 'crypto',
            'payment_id' => uniqid('mcon_'),
            'status' => 'pending',
        ]);

        $paymentData = [
            'price_amount' => $membership['price'],
            'price_currency' => $membership['currency'],
            'pay_currency' => null, // Or any supported cryptocurrency
            'ipn_callback_url' => route('user.crypto.callback.process'),
            'order_id' => $payment->payment_id,
            'order_description' => ucfirst($type) . " Membership",
        ];

        $nowPaymentResponse = $this->nowPayments->createPayment($paymentData['price_amount'], $paymentData['price_currency'], $paymentData['order_id'], $paymentData['ipn_callback_url']);

        if (isset($nowPaymentResponse['token_id'])) {

            return redirect($nowPaymentResponse['invoice_url']); // Redirect user to NowPayments
        }

        return redirect()->route('membership.setting.view')->with('error', 'Unable to process payment.');
    }

    /**
     * Handles the callback from NowPayments when a payment is made.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCallback(Request $request)
    {
        $paymentId = $request->input('payment_id');

        try {
            // Get the payment status from NowPayments
            $paymentStatus = $this->nowPayments->getPaymentStatus($paymentId);

            // Get the payment record from the database
            $payment = Payments::where('payment_id', $paymentId)->firstOrFail();

            // Update the payment status
            if ($paymentStatus['payment_status'] === 'finished') {
                $payment->update(['status' => 'completed']);

                // Update the user's membership
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

                // Return a success message
                return redirect()->route('membership.setting.view')->with('success', 'Payment successful. Welcome to ' . ucfirst($type) . ' Membership!');
            }

            // Update the payment status to failed
            $payment->update(['status' => 'failed']);
            return redirect()->route('membership.setting.view')->with('error', 'Payment not completed yet.');
        } catch (\Exception $e) {
            // Return an error message if an exception is thrown
            return redirect()->route('membership.setting.view')->with('error', $e->getMessage());
        }
    }
}
