<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserVerify;
use EzeanyimHenry\EmailValidator\EmailValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request) {
        $pageTitle = "Sign up || ". env("APP_NAME");

        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        return view('user.auth.register', compact('pageTitle'));
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) {

        $emailValidator = new EmailValidator([
            'checkMxRecords' => true,
            'checkBannedListedEmail' => true,
            'checkDisposableEmail' => true,
            'checkFreeEmail' => false,
        ]);

        $result = $emailValidator->validate($request->validated('email'));

        if (!$result['isValid']) {

            return redirect()->back()->with('error', 'This email address canot be used at this time');
        }

        $user = User::create($request->validated());

        if ($request->input('referral_code')) {
            $referrer = User::where('referral_code', $request->input('referral_code'))->first();

                if ($referrer) {
                    Referral::create([
                        'referrer_id' => $referrer->id,
                        'user_id' => $user->id,
                    ]);

                    $referral_code = strtolower(str_replace(' ', '', $referrer->username));
                    $referrer->referral_code = $referral_code;
                    $referrer->save();

                } else {

                    return redirect()->back()->with('error', 'Invalid referral code.');
            }
        }

        $email = $user->email;

        $referral_code = strtolower(str_replace(' ', '', $user->username));
        $user->referral_code = $referral_code;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->save();

        $token = Str::random(64);

        Mail::send('user.auth.mails.verify', ['token' => $token,
                                              'email' => $email,
                                              'name'  =>  $user->first_name], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification');
            });

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        session()->forget('referrer');

        return redirect()->route('auth.login.show')->with('success', 'Your Millennium Concierge account has been created successfully! Please login to start enjoying our services.');
    }
}
