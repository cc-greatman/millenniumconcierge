<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index() {

        $pageTitle = "Dashboard || ".env('APP_NAME');

        return view('user.dashboard', compact('pageTitle'));
    }

    public function membership() {

        $pageTitle = "Membership Plans || ". env('APP_NAME');

        return view('user.membership.pricing', compact('pageTitle'));
    }

    public function membershipSetting() {

        $pageTitle = "Membership Overview || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user  = User::findOrFail($id);

        $payments = $user->payments()->latest()->get();

        return view('user.membership.setting', compact('pageTitle', 'payments'));
    }
}
