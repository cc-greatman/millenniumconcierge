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

    public function personalReport($id) {

        $pageTitle = "Trips Overview || ". env('APP_NAME');

        $user  = User::findOrFail($id);

        $tripData = \App\Models\Trips::where('user_id', $id)
        ->select('type')
        ->selectRaw('COUNT(*) as total_trips')
        ->selectRaw('SUM(CASE WHEN status = "used" THEN 1 ELSE 0 END) as used_tickets')
        ->selectRaw('SUM(CASE WHEN status = "unused" THEN 1 ELSE 0 END) as unused_tickets')
        ->selectRaw('SUM(cost) as total_cost') // Calculate total cost for each type
        ->groupBy('type')
        ->get()
        ->keyBy('type'); // Key the collection by type for easier access

        $hotelData = [
            'sum' => Bookings::where('user_id', $id)->sum('cost'),
            'count' => Bookings::where('user_id', $id)->count(),
            'pending' => Bookings::where('user_id', $id)->where('status','unused')->count(),
            'completed' => Bookings::where('user_id', $id)->where('status','used')->count(),
        ];

        return view('admin.user.report', compact('pageTitle', 'tripData', 'hotelData', 'user'));
    }

    public function flightsCompleted() {

        $pageTitle = "Flights Completed || ". env('APP_NAME');

        $trips = Trips::whereIn('type', ['commercial', 'private'])
                        ->where('status', 'used')
                        ->get();

        $sum = Trips::whereIn('type', ['commercial', 'private'])
                    ->where('status', 'used')
                    ->sum('cost');

        return view('admin.trips.flights.completed', compact('sum', 'trips', 'pageTitle'));
    }

    public function flightsPending() {

        $pageTitle = "Flights Pending || ". env('APP_NAME');

        $trips = Trips::whereIn('type', ['commercial', 'private'])
                        ->where('status', 'unused')
                        ->get();

        $sum = Trips::whereIn('type', ['commercial', 'private'])
                    ->where('status', 'unused')
                    ->sum('cost');

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

        return view('admin.trips.hotels.completed', compact('pageTitle', 'bookings', 'sum'));
    }

    public function pendingBookings() {

        $pageTitle = "Pending Hotel Trips || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $bookings = Bookings::where([
                            'status' => 'unused',
                            ])->get();

        $sum = Bookings::where([
                    'status' => 'unused',
                    ])->sum('cost');

        return view('admin.trips.hotels.pending', compact('pageTitle', 'bookings', 'sum'));
    }

    public function userPrivateFlightsView($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Private Flight Trips || ". env('APP_NAME');

        $trips = Trips::where([
                        'user_id' => $id,
                        'type' => 'private',
                        ])->get();

        $sum = Trips::where([
                            'user_id' => $id,
                            'type' => 'private',
                            ])->sum('cost');

        return view('admin.trips.flights.user', compact('user', 'trips', 'pageTitle', 'sum'));
    }

    public function userCommercialFlightsView($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Commercial Flight Trips || ". env('APP_NAME');

        $trips = Trips::where([
                        'user_id' => $id,
                        'type' => 'commercial',
                        ])->get();

        $sum = Trips::where([
                            'user_id' => $id,
                            'type' => 'commercial',
                            ])->sum('cost');

        return view('admin.trips.flights.user', compact('user', 'trips', 'pageTitle', 'sum'));
    }

    public function userHelisView($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Helicopter Trips || ". env('APP_NAME');

        $trips = Trips::where([
                        'user_id' => $id,
                        'type' => 'helicopter',
                        ])->get();

        $sum = Trips::where([
                            'user_id' => $id,
                            'type' => 'helicopter',
                            ])->sum('cost');

        return view('admin.trips.helicopters.user', compact('user', 'trips', 'pageTitle', 'sum'));
    }

    public function userYachtsView($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Yacht Trips || ". env('APP_NAME');

        $trips = Trips::where([
                        'user_id' => $id,
                        'type' => 'yacht',
                        ])->get();

        $sum = Trips::where([
                            'user_id' => $id,
                            'type' => 'yacht',
                            ])->sum('cost');

        return view('admin.trips.yachts.user', compact('user', 'trips', 'pageTitle', 'sum'));
    }

    public function userHotelsView($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Hotel Trips || ". env('APP_NAME');

        $bookings = Bookings::where([
                        'user_id' => $id,
                        ])->get();

        $sum = Bookings::where([
                            'user_id' => $id,
                            ])->sum('cost');

        return view('admin.trips.hotels.user', compact('user', 'bookings', 'pageTitle', 'sum'));
    }

    public function editTrip($id) {

        $pageTitle = "Edit Trip || ". env('APP_NAME');

        $trip = Trips::findOrFail($id);

        $user = User::findOrFail($trip->user_id);

        return view('admin.trips.edit', compact('trip', 'pageTitle', 'user'));
    }

    public function editHotel($id) {

        $pageTitle = "Edit Trip || ". env('APP_NAME');

        $trip = Bookings::findOrFail($id);

        $user = User::findOrFail($trip->user_id);

        return view('admin.trips.edit-hotel', compact('trip', 'pageTitle', 'user'));
    }

    public function createTrip() {

        $pageTitle = "Create Trip || ".env('APP_NAME');

        $users = User::all();

        return view('admin.trips.view', compact('pageTitle', 'users'));
    }

    public function createHotel() {
 
        $pageTitle = "Create Hotel Trip || ".env('APP_NAME');

        $users = User::all();

        return view('admin.trips.hotel', compact('pageTitle', 'users'));
    }

    public function createTripView($id) {

        $pageTitle = "Create a New Trip || ". env('APP_NAME');

        $user = User::findOrFail($id);

        return view('admin.trips.create', compact('pageTitle', 'user'));
    }

    public function createBookingView($id) {

        $pageTitle = "Create a New Trip || ". env('APP_NAME');

        $user = User::findOrFail($id);

        return view('admin.trips.booking', compact('pageTitle', 'user'));
    }
}
