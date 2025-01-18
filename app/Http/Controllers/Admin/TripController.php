<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trips;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Store a newly created trip in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|in:private,commercial,yacht,helicopter',
            'airline' => 'required|string|max:255',
            'ticket_type' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date|after:departure_date',
            'baggage_allowance' => 'required|string|max:255',
            'cost' => 'required|numeric|min:0',
            'departure' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'seats' => 'required|integer|min:1',
            'status' => 'required|in:used,unused',
            'extra_comments' => 'nullable|string',
        ]);

        // Create the trip
        $trip = Trips::create($validated);

        // Redirect to a success page or the trips list
        return redirect()->route('admin.trips.create')->with('success', 'Trip created successfully.');
    }
}
