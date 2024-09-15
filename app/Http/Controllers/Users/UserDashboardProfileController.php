<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Institution;


class UserDashboardProfileController extends Controller
{
    /**
     * Show the user dashboard profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieve the authenticated user's profile data
        $data = auth()->user()->profileData(); // Adjust according to your actual method

        return view('users.UserDashboardProfile', compact('data'));
    }


    public function updateInstitutionProfile(Request $request)
    {
        // Get the currently authenticated institution or user
        $institutionId = auth()->user()->id;
        $institution = Institution::findOrFail($institutionId);

        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'website' => 'required|url',
            'password' => 'required',  // Current password for confirmation
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the entered current password is correct
        if (!Hash::check($request->password, $institution->password)) {
            return redirect()->back()->withErrors(['password' => 'The current password is incorrect'])->withInput();
        }

        // Update institution profile with new details
        $institution->update([
            'fullname' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'address' => $request->address,
            'location' => $request->location,
            'website' => $request->website,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
