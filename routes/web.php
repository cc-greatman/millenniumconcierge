<?php

use Illuminate\Support\Facades\Request;
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
    Route::get('society', 'FrontendController@society')->name('society');
    Route::get('membership', 'FrontendController@membership')->name('membership');
    Route::get('enquiry', 'FrontendController@contact')->name('contact');
    Route::get('gallery', 'FrontendController@gallery')->name('gallery');

    //-- Cron Routes
    Route::get('currency-rates', 'CronController@handle')->name('currency.rates');
    Route::get('/send-bookings', 'Admin\TripController@sendBookingsToUsers');

    //-- Currency Converter Route
    Route::post('/change-currency', 'CurrencyController@changeCurrency')->name('currency.change');
    Route::get('/convert-prices', 'CurrencyController@convertPrices')->name('currency.convert');
    Route::get('/convert-single-price', 'CurrencyController@convertSinglePrice')->name('currency.convert');


    Route::group(['middleware' => ['guest']], function() {

        Route::name('auth.')->prefix('auth')->group(function() {

            //-- Registration Routes
            Route::get('register', 'Auth\RegisterController@show')->name('register.show');
            Route::post('register', 'Auth\RegisterController@register')->name('register.perform')->middleware('throttle:5,1');

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

        Route::middleware(['auth:web'])->group(function() {

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

                            //-- All Flights Route
                            Route::name('flights.')->prefix('flights')->group(function() {
                                Route::get('completed', 'User\ViewController@flightsCompleted')->name('completed.view');
                                Route::get('pending', 'User\ViewController@flightsPending')->name('pending.view');
                            });

                            //-- All Helicopters Route
                            Route::name('helicopters.')->prefix('helicopters')->group(function() {
                                Route::get('completed', 'User\ViewController@helisCompleted')->name('completed.view');
                                Route::get('pending', 'User\ViewController@helisPending')->name('pending.view');
                            });

                            //-- All Yachts Route
                            Route::name('yachts.')->prefix('yachts')->group(function() {
                                Route::get('completed', 'User\ViewController@yachtsCompleted')->name('completed.view');
                                Route::get('pending', 'User\ViewController@yachtsPending')->name('pending.view');
                            });

                            //-- All Hotel Routes
                            Route::name('hotels.')->prefix('hotels')->group(function() {
                                Route::get('completed', 'User\ViewController@completedBookings')->name('completed.view');
                                Route::get('pending', 'User\ViewController@pendingBookings')->name('pending.view');
                            });

                        });

                        Route::name('account.')->prefix('account')->group(function() {
                            Route::get('profile', 'User\ViewController@profileView')->name('profile.view');
                            Route::post('profile/update', 'User\ProfileController@updateProfile')->name('profile.update');
                            Route::post('identity/upload', 'User\ProfileController@identityUpload')->name('identity.upload');
                            Route::post('password/update', 'User\ProfileController@passwordUpdate')->name('password.update');
                        });
                    });
                });
            });
        });

        //-- All Admin Routes
        Route::name('admin.')->prefix('admin')->group(function() {

            Route::name('auth.')->prefix('auth')->group(function() {

                //-- Login Routes
                Route::get('login', 'Auth\LoginController@adminShow')->name('login.show');
                Route::post('login', 'Auth\LoginController@adminLogin')->name('login.perform');

            });

            Route::middleware(['auth:admin'])->group(function () {

                //-- Logout Route
                Route::get('logout', 'Auth\LogoutController@adminPerform')->name('logout');

                Route::get('dashboard', 'Admin\ViewController@index')->name('dashboard.show');

                Route::name('manage.')->prefix('manage')->group(function() {
                    //-- Manage User Routes
                    Route::get('user/view', 'Admin\ViewController@manageUsers')->name('users.view');
                    Route::get('user/view/{id}', 'Admin\UserController@viewUser')->name('person.view');
                    Route::get('user/create', 'Admin\ViewController@createUser')->name('users.create');
                    Route::get('user/report/{id}', 'Admin\ViewController@personalReport')->name('user.report.view');
                    Route::post('user/create/new', 'Admin\UserController@createUser')->name('new.create');
                    Route::post('user/edit/{id}', 'Admin\UserController@editUser')->name('user.edit');
                    Route::post('user/password/{id}', 'Admin\UserController@editUserPwd')->name('user.pwd.edit');
                    Route::post('user/membership/{id}', 'Admin\UserController@editUserMembership')->name('user.membership.edit');
                    Route::post('user/identity/{id}', 'Admin\UserController@editUseridentity')->name('user.identity.edit');
                    Route::get('user/delete/{id}', 'Admin\UserController@deleteUser')->name('user.delete');
                });

                //-- All Trips Route
                Route::name('trips.')->prefix('trips')->group(function () {
                    Route::get('overview', 'Admin\ViewController@tripsView')->name('all.view');

                    //-- Create New Trips Route
                    Route::name('create.')->prefix('create')->group(function () {
                        Route::get('/', 'Admin\ViewController@createTrip')->name('index');
                        Route::post('new/view', 'Admin\ViewController@switchView')->name('view.switch');
                        Route::get('new/{id}', 'Admin\ViewController@createTripView')->name('new');
                        Route::get('hotel/new', 'Admin\ViewController@createHotelView')->name('hotel.view');
                        Route::get('hotel/new/{id}', 'Admin\ViewController@createBookingView')->name('hotel.new');
                        Route::post('new/process', 'Admin\TripController@create')->name('process');
                        Route::post('new/hotel/process', 'Admin\TripController@createProcess')->name('hotel.process');
                    });

                    Route::name('edit.')->prefix('edit')->group(function() {
                        Route::get('/{id}', 'Admin\ViewController@editTrip')->name('index');
                        Route::put('/update/{id}', 'Admin\TripController@update')->name('update.process');
                    });

                    Route::delete('delete/{trip}', 'Admin\TripController@destroy')->name('destroy');

                    //-- All Flights Route
                    Route::name('flights.')->prefix('flights')->group(function() {
                        Route::get('completed', 'Admin\ViewController@flightsCompleted')->name('completed.view');
                        Route::get('pending', 'Admin\ViewController@flightsPending')->name('pending.view');
                    });

                    //-- All Helicopters Route
                    Route::name('helicopters.')->prefix('helicopters')->group(function() {
                        Route::get('completed', 'Admin\ViewController@helisCompleted')->name('completed.view');
                        Route::get('pending', 'Admin\ViewController@helisPending')->name('pending.view');
                    });

                    //-- All Yachts Route
                    Route::name('yachts.')->prefix('yachts')->group(function() {
                        Route::get('completed', 'Admin\ViewController@yachtsCompleted')->name('completed.view');
                        Route::get('pending', 'Admin\ViewController@yachtsPending')->name('pending.view');
                    });

                    //-- All Hotel Routes
                    Route::name('hotels.')->prefix('hotels')->group(function() {
                        Route::get('completed', 'Admin\ViewController@completedBookings')->name('completed.view');
                        Route::get('pending', 'Admin\ViewController@pendingBookings')->name('pending.view');
                    });

                    //-- User Report Generated Views
                    Route::name('user.')->prefix('user')->group(function() {
                        Route::get('flights/private/{id}', 'Admin\ViewController@userPrivateFlightsView')->name('private.flights.view');
                        Route::get('flights/commercial/{id}', 'Admin\ViewController@userCommercialFlightsView')->name('commercial.flights.view');
                        Route::get('hotels/{id}', 'Admin\ViewController@userHotelsView')->name('hotels.view');
                        Route::get('helis/{id}', 'Admin\ViewController@userHelisView')->name('helicopters.view');
                        Route::get('yachts/{id}', 'Admin\ViewController@userYachtsView')->name('yachts.view');
                    });
                });
            });
        });
});
