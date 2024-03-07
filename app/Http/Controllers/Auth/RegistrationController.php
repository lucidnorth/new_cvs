<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User; // Import the User model
class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }
    
    
    public function registerEmployer(Request $request)
    {
        // Validation logic for employer registration
        // Save employer data to the employer database
        // Redirect to employer dashboard
    }

    public function registerInstitution(Request $request)
    {
        if ($request->isMethod('post')) {
            // Validate the request data
            $validatedData = $request->validate([
            'institutions' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:institutions|max:255',
            'password' => 'required|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            ]);
    
            // Create a new instance of the User model
            $user = new User();
                $user->name=$validatedData['institutions'];
                $user->email=$validatedData['email'];
                $user->password =  bcrypt($validatedData['password']);
                $user->approved = 1;
            $user->save();

            // Create a new instance of the Institution model and associate it with the user account
            $institution = Institution::create([
                'institutions' => $validatedData['institutions'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'fullname' => $validatedData['fullname'],
                'country' => $validatedData['country'],
                'location' => $validatedData['location'],
                'website' => $validatedData['website'],
            ]);

            $user->institution_id =  $institution->id;
            $user->save();
    
            // Authenticate the user
            Auth::login($user);
    
            // Flash success message
            Session::flash('success', 'Registration successful!');
    
            // Redirect to user dashboard after successful registration
            return redirect()->route('user.dashboard');
        } else {
            // Flash failure message
            Session::flash('error', 'Registration failed! Please check your input.');
    
            // Handle GET request, perhaps return a view with the registration form
            return redirect()->route('registration.form')->with('error', 'Registration failed! Please check your input.');
        }
    }
    
    

}

