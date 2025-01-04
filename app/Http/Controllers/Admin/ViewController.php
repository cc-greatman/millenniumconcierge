<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index() {

        $pageTitle = "Staff Dashboard || ". env('APP_NAME');

        $totalUsers = User::count();

        $totalSilverMembers = User::whereHas('memberships', function ($query) {
            $query->where('type', 1);
        })->count();

        $totalGoldMembers = User::whereHas('memberships', function ($query) {
            $query->where('type', 2);
        })->count();

        $totalPlatinumMembers = User::whereHas('memberships', function ($query) {
            $query->where('type', 3);
        })->count();


        return view('admin.dashboard', compact('pageTitle', 'totalUsers', 'totalGoldMembers', 'totalSilverMembers', 'totalPlatinumMembers'));
    }

    public function manageUsers() {

        $pageTitle = "Manage Users || ".env('APP_NAME');

        $users = User::with('memberships')->get();

        return view('admin.user.overview', compact('pageTitle', 'users'));
    }

    public function createUser() {

        $pageTitle = "Create Users || ".env('APP_NAME');

        return view('admin.user.create', compact('pageTitle'));
    }
}
