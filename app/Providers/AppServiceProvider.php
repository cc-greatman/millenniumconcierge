<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Blade::if('silverMember', function () {
            return Auth::check() && Auth::user()->membership === 1;
        });

        Blade::if('goldMember', function () {
            return Auth::check() && Auth::user()->membership === 2;
        });

        Blade::if('platinumMember', function () {
            return Auth::check() && Auth::user()->membership === 3;
        });

        Blade::if('noneMember', function () {
            return Auth::check() && Auth::user()->membership === 0;
        });
    }
}
