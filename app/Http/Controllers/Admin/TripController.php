<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AllHotelTripsPDF;
use App\Models\Bookings;
use App\Models\Trips;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TripController extends Controller
{
    /**
     * Store a newly created trip in storage.
     */
    public function create(Request $request)
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
        return redirect()->route('admin.trips.create.index')->with('success', 'Trip created successfully.');
    }

    /**
     * Delete the specified trip from storage.
     */
    public function destroy(Trips $trip)
    {
        // Delete the trip
        $trip->delete();

        // Redirect to a success page or the trips list
        return redirect()->route('admin.trips.all.view')->with('success', 'Trip deleted successfully.');
    }

    public function update(Request $request, $id) {

        // Validate the incoming request data
        $request->validate([
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

        // Find the trip by ID
        $trip = Trips::findOrFail($id);

        // Update the trip with validated data
        $trip->update([
            'type' => $request->input('type'),
            'airline' => $request->input('airline'),
            'ticket_type' => $request->input('ticket_type'),
            'departure_date' => $request->input('departure_date'),
            'arrival_date' => $request->input('arrival_date'),
            'baggage_allowance' => $request->input('baggage_allowance'),
            'cost' => $request->input('cost'),
            'departure' => $request->input('departure'),
            'destination' => $request->input('destination'),
            'seats' => $request->input('seats'),
            'status' => $request->input('status'),
            'extra_comments' => $request->input('extra_comments', ''),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Trip updated successfully.');
    }

    public function createProcess(Request $request) {

        // Validate the incoming request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel' => 'required|string|max:255',
            'room_type' => 'required|string|in:Executive Suite,Penthouse,Single Room',
            'room_qty' => 'required|integer|min:1',
            'cost' => 'required|numeric|min:0',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'details' => 'nullable|string',
            'status' => 'required|in:used,unused',
        ]);

        // Create the booking record
        Bookings::create([
            'user_id' => $request->user_id,
            'hotel' => $request->hotel,
            'room_type' => $request->room_type,
            'room_qty' => $request->room_qty,
            'cost' => $request->cost,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Booking created successfully.');
    }

    public function sendBookingsToUsers() {

        $user = User::where('id', 1)->first(); // Fetch the specific user

        if ($user) {
            // Fetch bookings for the user
            $bookings = $user->bookings()->get();

            // Generate PDF
            $pdf = Pdf::loadView('pdf.booking', [
                'bookings' => $bookings, // Pass empty if no bookings
                'user' => $user,
            ]);

            // Send email with PDF
            Mail::to('blessedgreatman96@gmail.com')->send(new AllHotelTripsPDF($pdf->output(), $user));
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
