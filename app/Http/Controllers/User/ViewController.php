<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Trips;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index() {

        $id = auth()->guard('web')->id();

        // Get current time
        $now = Carbon::now();

        // Weekly expenses
        $weeklyExpenses = Trips::where('user_id', $id)
            ->whereBetween('created_at', [$now->startOfWeek(), $now->endOfWeek()])
            ->sum('cost') +
            Bookings::where('user_id', $id)
            ->whereBetween('created_at', [$now->startOfWeek(), $now->endOfWeek()])
            ->sum('cost');

        // Monthly expenses
        $monthlyExpenses = Trips::where('user_id', $id)
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->sum('cost') +
            Bookings::where('user_id', $id)
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->sum('cost');

        // Yearly expenses
        $yearlyExpenses = Trips::where('user_id', $id)
            ->whereYear('created_at', $now->year)
            ->sum('cost') +
            Bookings::where('user_id', $id)
            ->whereYear('created_at', $now->year)
            ->sum('cost');

        // Yearly trips expenses
        $yearlyTripsExpenses = Trips::where('user_id', $id)
        ->whereYear('created_at', $now->year)
        ->sum('cost');

        // Yearly hotel bookings expenses
        $yearlyHotelExpenses = Bookings::where('user_id', $id)
            ->whereYear('created_at', $now->year)
            ->sum('cost');

        $yearlyGoal = $yearlyExpenses;

        // Check for zero expenses and handle division by zero
        if ($yearlyGoal > 0) {
            $tripsProgress = ($yearlyTripsExpenses / $yearlyGoal) * 100;
            $hotelProgress = ($yearlyHotelExpenses / $yearlyGoal) * 100;
        } else {
            $tripsProgress = 0;
            $hotelProgress = 0;
        }

        $pageTitle = "Dashboard || ".env('APP_NAME');

        return view('user.dashboard', compact('pageTitle'), [
            'weeklyExpenses' => $weeklyExpenses,
            'monthlyExpenses' => $monthlyExpenses,
            'yearlyExpenses' => $yearlyExpenses,
            'yearlyTripsExpenses' => $yearlyTripsExpenses,
            'yearlyHotelExpenses' => $yearlyHotelExpenses,
            'tripsProgress' => $tripsProgress,
            'hotelProgress' => $hotelProgress,
        ]);
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

    public function flightsCompleted() {

        $pageTitle = "Flights Completed || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->sum('cost');

        return view('user.trips.flights.completed', compact('sum', 'trips', 'pagetitle'));
    }

    public function flightsPending() {

        $pageTitle = "Flights Pending || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'commercial',
                        'type' => 'private',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->sum('cost');

        return view('user.trips.flights.pending', compact('sum', 'trips', 'pagetitle'));
    }

    public function helisCompleted() {

        $pageTitle = "Helicopter Trips Completed || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'helicopter',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'helicopter',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->sum('cost');

        return view('user.trips.helicopters.completed', compact('sum', 'trips', 'pagetitle'));
    }

    public function helisPending() {

        $pageTitle = "Helicopter Trips Pending || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'helicopter',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'helicopter',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->sum('cost');

        return view('user.trips.helicopters.pending', compact('sum', 'trips', 'pagetitle'));
    }

    public function yachtsCompleted() {

        $pageTitle = "Yacht Trips Completed || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'yacht',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'yacht',
                        'user_id'=> $id,
                        'status' => 'used',
                        ])->sum('cost');

        return view('user.trips.yachts.completed', compact('sum', 'trips', 'pagetitle'));
    }

    public function yachtsPending() {

        $pageTitle = "Yacht Trips Pending || ". env('APP_NAME');

        $id = auth(['web'])->id();

        $trips = Trips::where([
                        'type' => 'yacht',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->get();

        $sum = Trips::where([
                        'type' => 'yacht',
                        'user_id'=> $id,
                        'status' => 'unused',
                        ])->sum('cost');

        return view('user.trips.yachts.pending', compact('sum', 'trips', 'pagetitle'));
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
