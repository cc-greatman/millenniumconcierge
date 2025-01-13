<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Trips;
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

    public function tripsView() {

        $pageTitle = "Trips Overview || ". env('APP_NAME');

        $tripData = \App\Models\Trips::select('type')
        ->selectRaw('
            COUNT(*) as total_trips,
            SUM(CASE WHEN status = "used" THEN 1 ELSE 0 END) as used_tickets,
            SUM(CASE WHEN status = "unused" THEN 1 ELSE 0 END) as unused_tickets,
            SUM(cost) as total_cost
        ') // Aggregated fields combined for clarity
        ->groupBy('type')
        ->get()
        ->keyBy('type'); // Key the collection by type for easier access

        $hotelData = Bookings::selectRaw('
            SUM(cost) as total_cost,
            COUNT(*) as total_count,
            SUM(CASE WHEN status = "unused" THEN 1 ELSE 0 END) as pending_count,
            SUM(CASE WHEN status = "used" THEN 1 ELSE 0 END) as completed_count
        ')
        ->first()
        ->toArray();

        return view('admin.trips.all', compact('pageTitle', 'tripData', 'hotelData'));
    }

    public function completedTrips() {

        $pageTitle = "Completed Trips || ". env('APP_NAME');

        $tripData = \App\Models\Trips::select('type')
        ->selectRaw('
            COUNT(*) as total_trips,
            SUM(CASE WHEN status = "used" THEN 1 ELSE 0 END) as used_tickets,
            SUM(CASE WHEN status = "unused" THEN 1 ELSE 0 END) as unused_tickets,
            SUM(cost) as total_cost
        ') // Aggregated fields combined for clarity
        ->groupBy('type')
        ->get()
        ->keyBy('type'); // Key the collection by type for easier access

        $hotelData = Bookings::selectRaw('
            SUM(cost) as total_cost,
            COUNT(*) as total_count,
            SUM(CASE WHEN status = "unused" THEN 1 ELSE 0 END) as pending_count,
            SUM(CASE WHEN status = "used" THEN 1 ELSE 0 END) as completed_count
        ')
        ->first()
        ->toArray();

        return view('admin.trips.completed', compact('pageTitle', 'trips', 'sum', 'hotelData'));
    }

    public function editTrip($id) {

        $pageTitle = "Edit Trip || ". env('APP_NAME');

        $trip = Trips::where('id', $id);

        return view('admin.trips.edit', compact('trip', 'pageTitle'));
    }
}
