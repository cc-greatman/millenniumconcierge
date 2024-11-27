<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
}
