<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\SearchLog;


class UserInstitutionVerifiedCertificateController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $institution = $user->my_institution;
        $institutionCertificates = collect();
    
        if ($institution) {
            // Get all certificate numbers associated with this institution
            $certificateNumbers = Certificate::where('institution_id', $institution->id)
                ->pluck('certificate_number')
                ->toArray();
    
            // Fetch search logs that match the certificate numbers
            $institutionCertificates = SearchLog::whereIn('search_term', $certificateNumbers)
                ->whereHas('certificate', function($query) use ($institution) {
                    $query->where('institution_id', $institution->id);
                })
                ->with('certificate')
                ->get();
        }
    
    return view('Users.UserDashboardinstitutionVerifiedCerticate',
     [ 'institutionCertificates' => $institutionCertificates
    
    ]);
    }

}
