<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as Session;

class EmailVerifyController extends Controller
{
    /**
      * Display Page user sees while waiting for mail
      *
      * @var string
      */
      public function show() {
        $user = auth()->user();

        if (!$user->is_email_verified) {

            $pageTitle = "Verify Email || " .env('APP_NAME');

            return view('user.auth.verify', compact('pageTitle'));
        } else {

            return redirect()->route('user.dashboard');
        }
      }

      /**
       * Create a new controller instance.
       *
       * @return void
       */

       public function verifyAccount($token, $email) {

        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry Your email cannot be identified.';

        if(!is_null($verifyUser)) {

            $user = $verifyUser->user;

            if(!$user->is_email_verified) {

                if ($email === $user->email) {
                    $user->is_email_verified = 1;
                    $user->save();

                    $message = "Your e-mail is verified and you can now log in.";

                    Session::flush();

                    Session::invalidate();

                    Auth::logout();

                    return redirect()->route('auth.login.show')->with('success', $message);
                } else {

                    $message = "Incorrect email address";

                     Session::flush();

                     Session::invalidate();

                     Auth::logout();

                     return redirect()->route('auth.login.show')->with('error', $message);
                }

            } else {

                $message = "Your e-mail is already verified.";

                Session::flush();

                Session::invalidate();

                Auth::logout();

                return redirect()->route('auth.login.show')->with('success', $message);
            }
          } else {

            Session::flush();

            Session::invalidate();

            Auth::logout();

            return redirect()->route('email.verify.show')->with('error', $message);
          }

           Session::flush();

            Session::invalidate();

            Auth::logout();

            return redirect()->route('email.verify.show')->with('error', $message);
       }

       public function resend(Request $request) {

            $user = DB::table('users')->where('id', $request->id)->first();

            DB::table('user_verifies')->where('user_id', $user->id)->delete();

            $token = Str::random(64);
            $email = $user->email;

            Mail::send('user.auth.mails.verify', ['token' => $token,
                                                  'email' => $email,
                                                  'name'  => $user->first_name], function($message) use($user){
                $message->to($user->email);
                $message->subject('Email Verification');
            });

            UserVerify::create([
                'user_id' => $user->id,
                'token' => $token
            ]);

            return redirect()->back()->with('success', 'Email verification link has been resent successfully');
       }
}

