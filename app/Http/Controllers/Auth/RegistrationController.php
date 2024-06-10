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
class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    public function registerEmployer(Request $request)

    {
        

        //   Dump request data for debugging
    //dd($request->all());
      
    DB::beginTransaction();
       try {
        $request->validate([
            'name' => 'required|string|max:255',
            'fullname' => 'required|string|max:255',
            'registrationnumber' => 'required|string|max:255|unique:employers',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'idtype' => 'required|string|max:255',
            'idnumber' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'industry' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'industry' => 'required|string|max:255',
        ]);

        
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password =  bcrypt( $request->password);
        $user->approved = 1;
        $user->save();

        RoleUser::updateOrCreate(
            [
            'user_id'=> $user->id,
            'role_id'=> Role::where('title', 'Customer Employer')->first()->id
            ],
            [
                'user_id'=> $user->id,
                'role_id'=> Role::where('title', 'Customer Employer')->first()->id
            ]
    );

        // Create employer
        $employer = new Employer();
        $employer->name = $request->name;
        $employer->fullname = $request->fullname;
        $employer->registrationnumber = $request->registrationnumber;
        $employer->address = $request->address;
        $employer->phone = $request->phone;
        $employer->idtype = $request->idtype;
        $employer->idnumber = $request->idnumber;
        $employer->industry = $request->industry;
        $employer->user_id = $user->id;
        $employer->save();

         // Authenticate the user
         Auth::login($user);

        DB::commit();
       } catch (\Throwable $th) {
        DB::rollBack();
        dd ($th);
       }

        // Redirect
        return redirect()->route('user.dashboard')->with('success', 'Registration successful! Please log in.');

        
    }  
    
    // public function registerEmployer(Request $request)
    // {
    //     // Validation logic for employer registration
    //     // Save employer data to the employer database
    //     // Redirect to employer dashboard
    // }

    

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

            RoleUser::updateOrCreate(
                [
                'user_id'=> $user->id,
                'role_id'=> Role::where('title', 'Customer Institution Owner')->first()->id
                ],
                [
                    'user_id'=> $user->id,
                    'role_id'=> Role::where('title','Customer Institution Owner')->first()->id
                ]
        );

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

