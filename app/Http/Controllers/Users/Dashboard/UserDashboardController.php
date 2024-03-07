<?php

namespace App\Http\Controllers\Users\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{

    public function index( )
{
    $institution = auth()->user()->my_institution; 
    return view('users.UserDashboard', compact('institution'));
}

public function profile()
{
    // Fetch the current user's institution information
    $institution = auth()->user()->my_institution;

    return view('users.UserDashboardProfile', compact('institution'));
}

    public function papers()
    {
        return view('users.UserDashboardPapers');
    }
}
