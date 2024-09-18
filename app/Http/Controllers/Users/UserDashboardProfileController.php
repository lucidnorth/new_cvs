<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Institution;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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


    // public function updateInstitutionProfile(Request $request)
    // {
    //     // Get the currently authenticated institution or user
    //     $userId = auth()->user()->id;
    //     $institution = Institution::findOrFail($userId);
    
    //     // Validate the input fields
    //     $validator = Validator::make($request->all(), [
    //         'fullname' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'phone' => 'required|string|max:15',
    //         'address' => 'required|string|max:255',
    //         'location' => 'required|string|max:255',
    //         'website' => 'required|url',
    //         'password' => 'required',  // Current password for confirmation
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    
    //     // Check if the entered current password is correct
    //     if (!Hash::check($request->password, $institution->password)) {
    //         return redirect()->back()->withErrors(['password' => 'The current password is incorrect'])->withInput();
    //     }
    
    //     // Update institution profile with new details
    //     $institution->update([
    //         'fullname' => $request->fullname,
    //         'country' => $request->country,
    //         'phone' => $request->phone,
    //         'address' => $request->address,
    //         'location' => $request->location,
    //         'website' => $request->website,
    //     ]);
    
    //     // Redirect back to the main profile page with a success message
    //     return redirect()->route('institution.profile')->with('success', 'Profile updated successfully!');
    // }
    public function updateInstitutionProfile(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'country' => 'required|string',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        // Get the current authenticated user
        $user = Auth::user();
        $institution = Institution::where('email', $validatedData['email'])->first();

        // Check if the password provided matches the current password
        if (!Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The password you provided is incorrect.']);
        }

        // Update the institution details
        if ($institution) {
            $institution->fullname = $validatedData['fullname'];
            $institution->country = $validatedData['country'];
            $institution->phone = $validatedData['phone'];
            $institution->address = $validatedData['address'];
            $institution->location = $validatedData['location'];
            $institution->website = $validatedData['website'];

            $institution->save();

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Institution not found.']);
        }
    }

    
    public function updateEmployerProfile(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'email' => 'required|email',
            'registrationnumber' => 'required|string|max:255',
            'idtype' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        // Get the current authenticated user
        $user = Auth::user();
        $employer = Employer::where('email', $validatedData['email'])->first();

        // Check if the password provided matches the current password
        if (!Hash::check($validatedData['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The password you provided is incorrect.']);
        }

        // Update the employer details
        if ($employer) {
            $employer->name = $validatedData['name'];
            $employer->fullname = $validatedData['fullname'];
            $employer->phone = $validatedData['phone'];
            $employer->address = $validatedData['address'];
            $employer->registrationnumber = $validatedData['registrationnumber'];
            $employer->idtype = $validatedData['idtype'];
            $employer->idnumber = $validatedData['idnumber'];
            $employer->industry = $validatedData['industry'];

            $employer->save();

            return redirect()->back()->with('success', 'Employer profile updated successfully!');
        } else {
            return redirect()->back()->withErrors(['email' => 'Employer not found.']);
        }
    }


    public function updatePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // 'confirmed' ensures that new_password_confirmation matches
        ]);

        // Get the current user
        $user = Auth::user();

        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect']);
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect back with a success message
        return back()->with('success', 'Password updated successfully.');
    }

}
