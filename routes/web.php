<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function() {

    //Email Verify Action Route
    Route::get('user/email/verify/{token}/{email}', 'Auth\EmailVerifyController@verifyAccount')->name('user.email.verify.perform');

    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('about', 'FrontendController@about')->name('about');
    Route::get('services', 'FrontendController@services')->name('services');
    Route::get('membership', 'FrontendController@membership')->name('membership');
    Route::get('enquiry', 'FrontendController@contact')->name('contact');
    Route::get('gallery', 'FrontendController@gallery')->name('gallery');


    Route::group(['middleware' => ['guest']], function() {

        Route::name('auth.')->prefix('auth')->group(function() {

            //-- Registration Routes
            Route::get('register', 'Auth\RegisterController@show')->name('register.show');
            Route::post('register', 'Auth\RegisterController@register')->name('register.perform');

            //-- Login Routes
            Route::get('login', 'Auth\LoginController@show')->name('login.show');
            Route::post('login', 'Auth\LoginController@login')->name('login.perform');

            //-- Google Login Routes
            Route::get('login/google', 'Auth\SocialiteController@redirectToGoogle')->name('login.google');
            Route::get('login/google/callback', 'Auth\SocialiteController@handleGoogleCallback');

            //-- Forgot Password Routes
            Route::get('forgot-password', 'Auth\ResetPassController@index')->name('forgot-password.show');
            Route::post('forgot-password', 'Auth\ResetPassController@sendLink')->name('forgot-password.perform');
            Route::get('reset-password/{token}', 'Auth\ResetPassController@show')->name('reset-password.show');
            Route::post('reset-password', 'Auth\ResetPassController@perform')->name('reset-password.perform');
        });
    });

        Route::middleware(['auth'])->group(function() {

            //-- Email Verification Routes
            Route::name('email.')->prefix('email')->group(function() {
                Route::get('verify', 'Auth\EmailVerifyController@show')->name('verify.show');
                Route::post('verify/resend', 'Auth\EmailVerifyController@resend')->name('verify.resend');
            });

            //-- Logout Route
            Route::get('logout', 'Auth\LogoutController@perform')->name('logout');

            Route::group(['middleware' => ['allow.email.verified.users']], function() {

                //-- Membership Routes
                Route::name('membership.')->prefix('membership')->group( function() {

                    Route::get('plans', 'User\ViewController@membership')->name('plans.view');
                    Route::get('settings', 'User\ViewController@membershipSetting')->name('setting.view');
                });

                //-- Paystack Routes
                Route::name('user.paystack.')->prefix('user/payment/paystack')->group(function() {
                    //-- All Paystack Routes
                    Route::get('pay', 'User\PaymentController@redirectToGateway')->name('pay.process');
                    Route::get('callback', 'User\PaymentController@handleGatewayCallback')->name('callback.process');
                });
                //-- Paystack Routes
                Route::name('user.crypto.')->prefix('user/payment/crypto')->group(function() {
                    //-- All Crypto Routes
                    Route::get('create/pay/{type}', 'User\CryptoController@createPayment')->name('create.pay');
                    Route::post('pay/callback', 'User\CryptoController@handleCallback')->name('callback.process');
                });

                Route::group(['middleware' => ['is.a.member']], function () {

                    Route::name('user.')->prefix('user')->group( function() {
                        //-- Dashboard Route
                        Route::get('dashboard', 'User\ViewController@index')->name('dashboard');

                        //-- All Trips Route
                        Route::name('trips.')->prefix('trips')->group(function () {
                            Route::get('overview', 'User\ViewController@tripsView')->name('all.view');
                            Route::get('completed', 'User\ViewController@completedTrips')->name('completed.view');
                            Route::get('pending', 'User\ViewController@pendingTrips')->name('pending.view');
                        });

                        //-- All Booking Route
                        Route::name('bookings.')->prefix('bookings')->group(function() {
                            Route::get('overview', 'User\ViewController@bookingsView')->name('all.view');
                            Route::get('completed', 'User\ViewController@completedBookings')->name('completed.view');
                            Route::get('pending', 'User\ViewController@pendingBookings')->name('pending.view');
                        });

                        Route::name('account.')->prefix('account')->group(function() {
                            Route::get('profile', 'User\ViewController@profileView')->name('profile.view');
                            Route::post('profile/update', 'User\ProfileController@updateProfile')->name('profile.update');
                        });
                    });
                });
            });
        });
});
