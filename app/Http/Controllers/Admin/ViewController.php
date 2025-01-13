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

        $hotelData = [
            'sum' => Bookings::sum('cost'),
            'count' => Bookings::count(),
            'pending' => Bookings::where('status','unused')->count(),
            'completed' => Bookings::where('status','used')->count(),
        ];

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

    public function flightsCompleted() {

        $pageTitle = "Flights Completed || ". env('APP_NAME');
        
        $trips = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'status' => 'used',
                        ])->sum('cost');

        return view('admin.trips.flights.completed', compact('sum', 'trips', 'pageTitle'));
    }

    public function flightsPending() {

        $pageTitle = "Flights Pending || ". env('APP_NAME');

        $trips = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'status' => 'unused',
                        ])->sum('cost');

        return view('admin.trips.flights.pending', compact('sum', 'trips', 'pageTitle'));
    }

    public function helisCompleted() {

        $pageTitle = "Helicopter Trips Completed || ". env('APP_NAME');

        $trips = Trips::where([
                        'type' => 'helicopter',
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'helicopter',
                        'status' => 'used',
                        ])->sum('cost');

        return view('admin.trips.helicopters.completed', compact('sum', 'trips', 'pageTitle'));
    }

    public function helisPending() {

        $pageTitle = "Helicopter Trips Pending || ". env('APP_NAME');

        $trips = Trips::where([
                        'type' => 'helicopter',
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'helicopter',
                        'status' => 'unused',
                        ])->sum('cost');

        return view('admin.trips.helicopters.pending', compact('sum', 'trips', 'pageTitle'));
    }

    public function yachtsCompleted() {

        $pageTitle = "Yacht Trips Completed || ". env('APP_NAME');

        $trips = Trips::where([
                        'type' => 'yacht',
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'yacht',
                        'status' => 'used',
                        ])->sum('cost');

        return view('admin.trips.yachts.completed', compact('sum', 'trips', 'pageTitle'));
    }

    public function yachtsPending() {

        $pageTitle = "Yacht Trips Pending || ". env('APP_NAME');

        $trips = Trips::where([
                        'type' => 'yacht',
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'yacht',
                        'status' => 'unused',
                        ])->sum('cost');

        return view('admin.trips.yachts.pending', compact('sum', 'trips', 'pageTitle'));
    }

    public function completedBookings() {

        $pageTitle = "Completed Hotel Trips || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $bookings = Bookings::where([
                            'status' => 'used',
                            ])->get();
        $sum = Bookings::where([
                    'status' => 'used',
                    ])->sum('cost');

        return view('user.bookings.completed', compact('pageTitle', 'bookings', 'sum'));
    }

    public function pendingBookings() {

        $pageTitle = "Pending Hotel Trips || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user = User::findOrFail($id);

        $bookings = Bookings::where([
                            'user_id'=> $id,
                            'status' => 'unused',
                            ])->get();
        $sum = Bookings::where([
                    'user_id'=> $id,
                    'status' => 'unused',
                    ])->sum('cost');

        return view('user.bookings.pending', compact('pageTitle', 'bookings', 'sum'));
    }

    public function editTrip($id) {

        $pageTitle = "Edit Trip || ". env('APP_NAME');

        $trip = Trips::where('id', $id);

        return view('admin.trips.edit', compact('trip', 'pageTitle'));
    }
}
