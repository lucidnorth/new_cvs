<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\SkillSearchLog;
use Illuminate\Support\Facades\Auth;

 
class UserDashboardSkillSearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'programme_type' => 'required|string|max:255',
        ]);
    
        $programmeType = $request->input('programme_type');
    
        // Log the search
        SkillSearchLog::create([
            'user_id' => Auth::id(),
            'search_term' => $programmeType,
        ]);
    
        // Search for certificates where the programme matches the input keyword
        $certificates = Certificate::where('programme', 'LIKE', '%' . $programmeType . '%')->get();
    
        return view('users.UserDashboardSkillSearch', compact('certificates', 'programmeType'));
    }
}