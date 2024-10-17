<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Employer;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class RegistrationController extends Controller

{
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }
   public function registerEmployer(Request $request)

{
        
    DB::beginTransaction();
    try {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'registrationnumber' => 'required|string|max:255|unique:employers',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:employers',
            'idtype' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255|unique:employers',
            'email' => 'required|string|email|max:255|unique:users',
            'industry' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one digit
                'regex:/[@$!%*#?&]/' // at least one special character
            ],
        ]);

        // Create new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->approved = 1;
        $user->save();

        // Assign role to the user
        RoleUser::updateOrCreate(
            [
                'user_id' => $user->id,
                'role_id' => Role::where('title', 'Customer Employer')->first()->id
            ]
        );

        // Create new employer
        $employer = new Employer();
        $employer->name = $request->name;
        $employer->fullname = $request->fullname;
        $employer->registrationnumber = $request->registrationnumber;
        $employer->address = $request->address;
        $employer->phone = $request->phone;
        $employer ->email= $request->email;
        $employer->idtype = $request->idtype;
        $employer->idnumber = $request->idnumber;
        $employer->industry = $request->industry;
        $employer->user_id = $user->id;
        $employer->save();

        // Authenticate the user
        Auth::login($user);

        DB::commit();
        // Redirect with success message
        return redirect()->route('user.dashboard')->with('success', 'Registration successful! Please log in.');
    } catch (\Illuminate\Database\QueryException $ex) {
        DB::rollBack();

        // Handle unique constraint violation
        if ($ex->getCode() == '23000') { // SQLSTATE code for unique constraint violation
            $errorMessage = 'A record with this ';
            if (str_contains($ex->getMessage(), 'registrationnumber')) {
                $errorMessage .= 'registration number ';
            } elseif (str_contains($ex->getMessage(), 'phone')) {
                $errorMessage .= 'phone number ';
            } elseif (str_contains($ex->getMessage(), 'idnumber')) {
                $errorMessage .= 'ID number ';
            } elseif (str_contains($ex->getMessage(), 'email')) {
                $errorMessage .= 'email address ';
            }
            $errorMessage .= 'already exists. Please use a different value.';

            return redirect()->back()->withErrors(['unique' => $errorMessage])->withInput();
        }

        // Log other errors
        Log::error('Registration error: ' . $ex->getMessage());
        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }
}

    
    // public function registerEmployer(Request $request)
    // {
    //     // Validation logic for employer registration
    //     // Save employer data to the employer database
    //     // Redirect to employer dashboard
    // }

    

    // public function registerInstitution(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         // Validate the request data
    //         $validatedData = $request->validate([
    //         'institutions' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'phone' => 'required|string|unique:institutions|max:255',
    //         'email' => 'required|email|unique:institutions|max:255',
    //         'password' => [
    //             'required',
    //             'string',
    //             'min:8',
    //             'confirmed',
    //             'regex:/[a-z]/',      // at least one lowercase letter
    //             'regex:/[A-Z]/',      // at least one uppercase letter
    //             'regex:/[0-9]/',      // at least one digit
    //             'regex:/[@$!%*#?&]/' // at least one special character
    //         ],
    //         'fullname' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'location' => 'required|string|max:255',
    //         'website' => 'required|string|unique:institutions|max:255',
    //         ]);
    
    //         // Create a new instance of the User model
    //         $user = new User();
    //             $user->name=$validatedData['institutions'];
    //             $user->email=$validatedData['email'];
    //             $user->password =  bcrypt($validatedData['password']);
    //             $user->approved = 1;
    //         $user->save();

    //         RoleUser::updateOrCreate(
    //             [
    //             'user_id'=> $user->id,
    //             'role_id'=> Role::where('title', 'Customer Institution Owner')->first()->id
    //             ],
    //             [
    //                 'user_id'=> $user->id,
    //                 'role_id'=> Role::where('title','Customer Institution Owner')->first()->id
    //             ]
    //     );

    //         // Create a new instance of the Institution model and associate it with the user account
    //         $institution = Institution::create([
    //             'institutions' => $validatedData['institutions'],
    //             'address' => $validatedData['address'],
    //             'phone' => $validatedData['phone'],
    //             'email' => $validatedData['email'],
    //             'password' => bcrypt($validatedData['password']),
    //             'fullname' => $validatedData['fullname'],
    //             'country' => $validatedData['country'],
    //             'location' => $validatedData['location'],
    //             'website' => $validatedData['website'],
    //         ]);

    //         $user->institution_id =  $institution->id;
    //         $user->save();
    
    //         // Authenticate the user
    //         Auth::login($user);
    
    //         // Flash success message
    //         Session::flash('success', 'Registration successful!');
    
    //         // Redirect to user dashboard after successful registration
    //         return redirect()->route('user.dashboard');
    //     } else {
    //         // Flash failure message
    //         Session::flash('error', 'Registration failed! Please check your input.');
    
    //         // Handle GET request, perhaps return a view with the registration form
    //         return redirect()->route('registration.form')->with('error', 'Registration failed! Please check your input.');
    //     }
    // }
    public function registerInstitution(Request $request)
    {
        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                // Validate the request data including the logo field
                $validatedData = $request->validate([
                    'institutions' => 'required|string|max:255',
                    'address' => 'required|string|max:255',
                    'phone' => 'required|string|unique:institutions|max:255',
                    'email' => 'required|email|unique:institutions|max:255',
                    'password' => [
                        'required',
                        'string',
                        'min:8',
                        'confirmed',
                        'regex:/[a-z]/',      // at least one lowercase letter
                        'regex:/[A-Z]/',      // at least one uppercase letter
                        'regex:/[0-9]/',      // at least one digit
                        'regex:/[@$!%*#?&]/' // at least one special character
                    ],
                    'fullname' => 'required|string|max:255',
                    'country' => 'string|max:255',
                    'location' => 'required|string|max:255',
                    'website' => 'string|unique:institutions|max:255',
                    'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate image
                ]);
    
                // Handle image upload
                $logo = null;
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo')->store('logos', 'public'); // Store image in 'logos' folder
                }
    
                // Create a new User
                $user = new User();
                $user->name = $validatedData['institutions'];
                $user->email = $validatedData['email'];
                $user->password = bcrypt($validatedData['password']);
                $user->approved = 1;
                $user->save();
    
                RoleUser::updateOrCreate([
                    'user_id' => $user->id,
                    'role_id' => Role::where('title', 'Customer Institution Owner')->first()->id
                ]);
    
                // Create a new Institution
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
                    'logo' => $logo, // Save the logo path
                ]);
    
                $user->institution_id = $institution->id;
                $user->save();
    
                Auth::login($user);
    
                DB::commit();
                Session::flash('success', 'Registration successful!');
    
                return redirect()->route('user.dashboard');
            } catch (\Illuminate\Database\QueryException $ex) {
                DB::rollBack();
    
                // Handle unique constraint violations
                // (Your existing logic here)
    
                return redirect()->back()->with('error', 'Registration failed. Please try again.');
            }
        } else {
            return redirect()->route('registration.form')->with('error', 'Registration failed! Please check your input.');
        }
    }
    
// ilhamagyemanginvestment@gmail.com
    

}

