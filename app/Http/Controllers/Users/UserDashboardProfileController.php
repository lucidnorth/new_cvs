<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
        $data = auth()->user(); // Adjust according to your actual method

        return view('users.UserDashboardProfile', compact('data'));
    }

    /**
     * Update the user profile (institution or employer).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     // Determine if the user is updating an institution or an employer
    //     $profileType = $request->input('profile_type'); // Expecting 'institution' or 'employer'

    //     // Common validation rules
    //     $commonRules = [
    //         'name' => 'required|string|max:255',
    //         'fullname' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'phone' => 'required|string|max:20',
    //         'address' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'password' => 'required|string|min:8|confirmed',
    //     ];

    //     // Additional validation rules for the employer
    //     $employerRules = [
    //         'location' => 'required|string|max:255',
    //         'website' => 'required|string|max:255',
    //         'idtype' => 'required|string|max:255',
    //         'idnumber' => 'required|string|max:255',
    //         'industry' => 'required|string|max:255',
    //     ];

    //     // Validate the incoming request data
    //     if ($profileType === 'employer') {
    //         $validatedData = $request->validate(array_merge($commonRules, $employerRules));
    //     } else {
    //         $validatedData = $request->validate($commonRules);
    //     }

    //     if (!Hash::check($request->input('current_password'), auth()->user()->password)) {
    //         return redirect()->back()->withErrors(['current_password' => 'Your current password is incorrect.']);
    //     }

    //     // Get the authenticated user's profile
    //     $user = auth()->user();

    //     // Update the profile based on the type
    //     if ($profileType === 'employer') {
    //         $profile = $user->employer; // Adjust according to your actual method
    //         $profile->update([
    //             'name' => $validatedData['name'],
    //             'fullname' => $validatedData['fullname'],
    //             'country' => $validatedData['country'],
    //             'phone' => $validatedData['phone'],
    //             'address' => $validatedData['address'],
    //             'email' => $validatedData['email'],
    //             'location' => $validatedData['location'],
    //             'website' => $validatedData['website'],
    //             'idtype' => $validatedData['idtype'],
    //             'idnumber' => $validatedData['idnumber'],
    //             'industry' => $validatedData['industry'],
    //             'password' => Hash::make($validatedData['password']),
    //         ]);
    //     } else {
    //         $profile = $user->my_institution; // Adjust according to your actual method
    //         $profile->update([
    //             'name' => $validatedData['name'],
    //             'fullname' => $validatedData['fullname'],
    //             'country' => $validatedData['country'],
    //             'phone' => $validatedData['phone'],
    //             'address' => $validatedData['address'],
    //             'email' => $validatedData['email'],
    //             'password' => Hash::make($validatedData['password']),
    //         ]);
    //     }

    //     // Optionally, you can return a response indicating success
    //     return redirect()->back()->with('success', 'Profile updated successfully');
    // }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'country' => 'required|string|max:2',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'website' => 'required|url',
            'password' => 'required|string', // Current password for confirmation
        ]);

        // Check if the current password matches
        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->withErrors(['password' => 'Your current password does not match our records.']);
        }

        // Get the authenticated user
        $user = auth()->user();

        // Update the profile details
        $user->fullname = $request->fullname;
        $user->country = $request->country;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->location = $request->location;
        $user->website = $request->website;

        // Save the updated user details
        // $user->save();

        // Return back with a success message
        return back()->with('success', 'Profile updated successfully!');
    }

    // Update user password
    // public function updatePassword(Request $request)
    // {
    //     // Validate password update input
    //     $request->validate([
    //         'current_password' => 'required',
    //         'new_password' => 'required|min:8|confirmed',
    //     ]);

    //     $user = Auth::user();

    //     // Check if the current password matches
    //     if (!Hash::check($request->input('current_password'), $user->password)) {
    //         return back()->withErrors(['current_password' => 'The current password is incorrect.']);
    //     }

    //     // Update the user's password
    //     $user->password = Hash::make($request->input('new_password'));
    //     $user->save();

    //     return back()->with('success', 'Password updated successfully.');
    // }
}
