<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {

        $pageTitle = "Home || ". env('APP_NAME');

        return view('frontend.index', compact('pageTitle'));
    }

    public function about() {

        $pageTitle = "About Us || ". env('APP_NAME');

        return view('frontend.about', compact('pageTitle'));
    }

    public function services() {

        $pageTitle = "Our Services || ". env('APP_NAME');

        return view('frontend.services', compact('pageTitle'));
    }

    public function membership() {

        $pageTitle = "Membership || ". env('APP_NAME');

        return view('frontend.membership', compact('pageTitle'));
    }

    public function contact() {

        $pageTitle = "Contact Us || ". env('APP_NAME');

        return view('frontend.enquiry', compact('pageTitle'));
    }

    public function gallery() {

        $pageTitle = "Picture Story || ". env('APP_NAME');

        return view('frontend.gallery', compact('pageTitle'));
    }
}
