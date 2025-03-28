<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Identification;
use App\Models\Membership;
use App\Models\Payments;
use App\Models\Trips;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewUser($id) {

        $user = User::findOrFail($id);

        $pageTitle = $user->first_name."'s Account Profile || ". env('APP_NAME');

        return view('admin.user.profile', compact('pageTitle', 'user'));
    }

    public function createUser(Request $request) {

        $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'is_email_verified' => 1
        ]);

        return redirect()->route('admin.manage.person.view', $user->id)->with('success', $user->first_name.'\'s Millennium Concierge account has been created successfully! Proceed to Identity Upload');
    }

    public function editUser(Request $request, $id) {

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric'
        ]);

        $user = User::findOrFail($id);
        $email_verified = $user->is_email_verified;

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->phone = $validated['phone'];
        $user->email = $request->input('email');
        $user->is_email_verified = $request->input('verify')??$email_verified;
        $user->save();

        return redirect()->back()->with('success', 'Profile details have been updated successfully!');
    }

    public function editUserPwd(Request $request, $id) {

        $user = User::findOrFail($id);

        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ],[
            'password.required' => "Please enter your current password",
        ]);

        User::where('id', $user->id)->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password updated successfully');

    }

    public function editUserIdentity(Request $request, $id) {

        $validated = $request->validate([
            'id_type' => 'required|in:local_passport,intl_passport,drivers_license,nin,voters_card',
            'front_id' => 'required|file|mimes:jpeg,png,jpg|max:10240', // Max size: 10MB (10240 KB)
            'back_id' => 'required|file|mimes:jpeg,png,jpg|max:10240',// Max size: 10MB (10240 KB)
        ]);

        $user = User::findOrFail($id);

        // Handle file uploads
        $frontIdPath = $request->file('front_id')->store('identifications', 'public');
        $backIdPath = $request->file('back_id')->store('identifications', 'public');

        // Save or update the identification in the database
        $user->identification()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'type' => $request->id_type,
                'file' => json_encode([
                    'front' => $frontIdPath,
                    'back' => $backIdPath,
                ]),
            ]
        );

        return redirect()->back()->with('success', 'Identity verification documents updated successfully!');
    }

    public function editUserMembership(Request $request, $id) {

        $validated = $request->validate([
            'type' => 'required|in:1,2,3'
        ]);

        $user = User::findOrFail($id);

        // Update or create membership
        $user->memberships()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'type' => $request->input('type'),
                'status' => 'active',
                'start_date' => now(),
                'end_date' => now()->addYear(),
            ]
        );

        return redirect()->back()->with('success', 'Membership Status updated successfully!');
    }

    public function deleteUser($id) {

        try {

            DB::beginTransaction();

            // Find the user
            $user = User::find($id);
            if ($user) {
                
                // Delete related records using relationships
                $user->trips()->delete();
                $user->bookings()->delete();
                $user->membership()->delete();
                $user->payments()->delete();

                if ($user->identification) {
                    $user->identification->delete();
                }

                // Finally delete the user
                $user->delete();
            }

            DB::commit();
            return redirect()->back()->with('success', 'User has been deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while deleting the user.');
        }
    }
}
