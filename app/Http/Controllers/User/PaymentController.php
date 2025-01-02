<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
        if (isset($paymentDetails['status']) && $paymentDetails['status'] === true) {
    
            // Get authenticated user
            $user = auth()->guard('web')->user();
    
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
    
            $success = "Payment successful. Welcome to Silver Membership!";
            $pageTitle = "Membership Overview || " . env('APP_NAME');
    
            return view('user.membership.setting', compact('pageTitle', 'success'));
        }
    
        // If payment failed
        $error = "Payment failed. Please try again.";
        $pageTitle = "Membership Overview || " . env('APP_NAME');
    
        return view('user.membership.setting', compact('pageTitle', 'error'));
    }
}
