<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(Request $request) {

        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric'
        ]);

        $id = auth()->guard('web')->id();

        $user = User::findOrFail($id);

        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->phone = $validated['phone'];
        $user->save();

        return redirect()->back()->with('success', 'Your Profile details have been updated successfully!');
    }

    public function identityUpload(Request $request) {

        $validated = $request->validate([
            'id_type' => 'required|in:local_passport,intl_passport,drivers_license,nin,voters_card',
            'front_id' => 'required|file|mimes:jpeg,png,jpg|max:10240', // Max size: 10MB (10240 KB)
            'back_id' => 'required|file|mimes:jpeg,png,jpg|max:10240',// Max size: 10MB (10240 KB)
        ]);

        $id = auth()->guard('web')->id();

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
}
