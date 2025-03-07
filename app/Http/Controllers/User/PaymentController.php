<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function redirectToGateway(Request $request) {

        $request->validate([
            'plan' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Convert amount to kobo (Paystack requires amount in kobo)
        $amountInKobo = $request->amount * 100;

        // Additional metadata (e.g., plan, user details)
        $metadata = [
            'plan' => $request->plan,
            'email' => auth()->guard('web')->user()->email, // Authenticated user's email
        ];

        // Initialize payment
        return Paystack::getAuthorizationUrl([
            'amount' => $amountInKobo,
            'email' => auth()->user()->email,
            'reference' => Paystack::genTranxRef(),
            'metadata' => $metadata,
            'callback_url' => route('user.paystack.callback.process'),
        ])->redirectNow();
    }

    public function handleGatewayCallback() {

        $paymentDetails = Paystack::getPaymentData();
        
        // Check if payment was successful
        if (isset($paymentDetails['status']) && $paymentDetails['status'] === true && $paymentDetails['data']['metadata']['plan'] === 'silver') {

            // Get authenticated user
            $id = auth()->guard('web')->id();
            $user = User::findOrFail($id);

            // Update or create membership
            $user->memberships()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'type' => 1, // Silver Membership
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                ]
            );

            // Create payment record
            $payment = Payments::updateOrCreate([
                'user_id' => auth()->id(),
                'membership_type' => 1,
                'amount' => 75000,
                'mode' => 'crypto',
                'payment_id' => uniqid('mcon_'),
                'status' => 'completed',
            ]);

            // Handle successful payment (e.g., activate membership)
            return redirect()->route('membership.setting.view')->with('success', 'Welcome to the Family!! New Silver Member!!!');
        } elseif (isset($paymentDetails['status']) && $paymentDetails['status'] === true && $paymentDetails['data']['metadata']['plan'] === 'gold') {

            // Get authenticated user
            $id = auth()->guard('web')->id();
            $user = User::findOrFail($id);

            // Update or create membership
            $user->memberships()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'type' => 2, // Gold Membership
                    'status' => 'active',
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                ]
            );

            // Create payment record
            $payment = Payments::updateOrCreate([
                'user_id' => auth()->id(),
                'membership_type' => 2,
                'amount' => 150000,
                'mode' => 'crypto',
                'payment_id' => uniqid('mcon_'),
                'status' => 'completed',
            ]);

            // Handle successful payment (e.g., activate membership)
            return redirect()->route('membership.setting.view')->with('success', 'Welcome to the Family!! New Gold Member!!!');
        }

        // If payment failed
        return redirect()->route('membership.setting.view')->with('error', 'Payment failed! Please try agaian');
    }
}
