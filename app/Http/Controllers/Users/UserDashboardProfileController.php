<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Update the user profile (institution or employer).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Determine if the user is updating an institution or an employer
        $profileType = $request->input('profile_type'); // Expecting 'institution' or 'employer'

        // Common validation rules
        $commonRules = [
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ];

        // Additional validation rules for the employer
        $employerRules = [
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'idtype' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
        ];

        // Validate the incoming request data
        if ($profileType === 'employer') {
            $validatedData = $request->validate(array_merge($commonRules, $employerRules));
        } else {
            $validatedData = $request->validate($commonRules);
        }

        // Get the authenticated user's profile
        $user = auth()->user();

        // Update the profile based on the type
        if ($profileType === 'employer') {
            $profile = $user->employer; // Adjust according to your actual method
            $profile->update([
                'name' => $validatedData['name'],
                'fullname' => $validatedData['fullname'],
                'country' => $validatedData['country'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'email' => $validatedData['email'],
                'location' => $validatedData['location'],
                'website' => $validatedData['website'],
                'idtype' => $validatedData['idtype'],
                'idnumber' => $validatedData['idnumber'],
                'industry' => $validatedData['industry'],
                'password' => Hash::make($validatedData['password']),
            ]);
        } else {
            $profile = $user->my_institution; // Adjust according to your actual method
            $profile->update([
                'name' => $validatedData['name'],
                'fullname' => $validatedData['fullname'],
                'country' => $validatedData['country'],
                'phone' => $validatedData['phone'],
                'address' => $validatedData['address'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
        }

        // Optionally, you can return a response indicating success
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
