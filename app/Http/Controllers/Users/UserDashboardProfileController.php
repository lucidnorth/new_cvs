<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
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
        // Retrieve the authenticated user's institution
        $institution = auth()->user()->my_institution;

        return view('users.UserDashboardProfile', compact('institution'));
    }

    /**
     * Update the institution profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get the authenticated user's institution
        $institution = auth()->user()->my_institution;

        // Update the institution profile with the validated data
        $institution->update([
            'name' => $validatedData['name'],
            'fullname' => $validatedData['fullname'],
            'country' => $validatedData['country'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'location' => $validatedData['location'],
            'website' => $validatedData['website'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Optionally, you can return a response indicating success
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
