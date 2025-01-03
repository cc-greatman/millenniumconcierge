<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Trips;
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

    public function tripsView() {

        $pageTitle = "Trips Overview || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

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

        return view('user.trips.all', compact('pageTitle', 'tripData'));
    }

    public function completedTrips() {

        $pageTitle = "Completed Trips || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user = User::findOrFail($id);

        $trips = Trips::where([
                            'user_id'=> $id,
                            'status' => 'used',
                            ])->get();
        $sum = Trips::where([
                    'user_id'=> $id,
                    'status' => 'used',
                    ])->sum('cost');

        return view('user.trips.completed', compact('pageTitle', 'trips', 'sum'));
    }

    public function pendingTrips() {

        $pageTitle = "Pending Trips || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user = User::findOrFail($id);

        $trips = Trips::where([
                            'user_id'=> $id,
                            'status' => 'unused',
                            ])->get();
        $sum = Trips::where([
                    'user_id'=> $id,
                    'status' => 'unused',
                    ])->sum('cost');

        return view('user.trips.pending', compact('pageTitle', 'trips', 'sum'));
    }

    public function bookingsView() {

        $pageTitle = "Bookings Overview || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user  = User::findOrFail($id);

        $bookingData = [
            'sum' => Bookings::where('user_id', $id)->sum('cost'),
            'count' => Bookings::where('user_id', $id)->count(),
            'pending' => Bookings::where('user_id', $id)->where('status','unused')->count(),
            'completed' => Bookings::where('user_id', $id)->where('status','used')->count(),
        ];

        return view('user.bookings.all', compact('pageTitle', 'bookingData'));
    }

    public function completedBookings() {

        $pageTitle = "Completed Bookings || ". env('APP_NAME');

        $id = auth()->guard('web')->id();

        $user = User::findOrFail($id);

        $bookings = Bookings::where([
                            'user_id'=> $id,
                            'status' => 'used',
                            ])->get();
        $sum = Bookings::where([
                    'user_id'=> $id,
                    'status' => 'used',
                    ])->sum('cost');

        return view('user.bookings.completed', compact('pageTitle', 'bookings', 'sum'));
    }

    public function pendingBookings() {

        $pageTitle = "Pending Bookings || ". env('APP_NAME');

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

    public function profileView() {

        $pageTitle = "Account Profile || ". env('APP_NAME');

        return view('user.profile', compact('pageTitle'));
    }
}
