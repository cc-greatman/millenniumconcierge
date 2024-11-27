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

            //Registration Routes
            Route::get('register', 'Auth\RegisterController@show')->name('register.show');
            Route::post('register', 'Auth\RegisterController@register')->name('register.perform');

            //Login Routes
            Route::get('login', 'Auth\LoginController@show')->name('login.show');
            Route::post('login', 'Auth\LoginController@login')->name('login.perform');

            //Google Login Routes
            Route::get('login/google', 'Auth\SocialiteController@redirectToGoogle')->name('login.google');
            Route::get('login/google/callback', 'Auth\SocialiteController@handleGoogleCallback');

            //Forgot Password Routes
            Route::get('forgot-password', 'Auth\ResetPassController@index')->name('forgot-password.show');
            Route::post('forgot-password', 'Auth\ResetPassController@sendLink')->name('forgot-password.perform');
            Route::get('reset-password/{token}', 'Auth\ResetPassController@show')->name('reset-password.show');
            Route::post('reset-password', 'Auth\ResetPassController@perform')->name('reset-password.perform');
        });
    });

        Route::middleware(['auth'])->group(function() {

            //Email Verification Routes
            Route::name('email.')->prefix('email')->group(function() {
                Route::get('verify', 'Auth\EmailVerifyController@show')->name('verify.show');
                Route::post('verify/resend', 'Auth\EmailVerifyController@resend')->name('verify.resend');
            });

            Route::group(['middleware' => ['allow.email.verified.users']], function() {

                //Membership Routes
                Route::name('membership.')->prefix('membership')->group( function() {

                    Route::get('plans', 'User\ViewController@membership')->name('plans.view');
                });

                Route::group(['middleware' => ['is.a.member']], function () {

                    Route::name('user.')->prefix('user')->group( function() {
                        //Dashboard Route
                        Route::get('dashboard', 'User\ViewController@index')->name('dashboard');

                        //Logout Route
                        Route::get('logout', 'Auth\LogoutController@perform')->name('logout');
                    });
                });
            });
        });
});
