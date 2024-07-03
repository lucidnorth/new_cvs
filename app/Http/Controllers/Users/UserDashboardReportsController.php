<?php

namespace App\Http\Controllers\Users;

use App\Exports\VerifiedCertificatesExport;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SkillSearchLog;

class UserDashboardReportsController extends Controller
{
    public function reports()
    {
        // $reports = Report::all();

        // Fetch authenticated user's ID
        $userId = Auth::id();

        // Fetch all search logs by the authenticated user
        $searchLogs = SearchLog::where('user_id', $userId)->get();

        // Initialize an empty collection to store certificates
        $certificates = collect();

        // Loop through each search log and fetch related certificates
        foreach ($searchLogs as $log) {
            $certificate = Certificate::where('certificate_number', $log->search_term)
                ->with('institution')
                ->first();
            
            if ($certificate) {
                $certificates->push($certificate);
            }
        }
        
        $skilSearchLogs = SkillSearchLog::where('user_id', $userId)->get();

        return view('users.UserDashboardReports', [
            // 'reports' => $reports,
            'certificates' => $certificates,
            'skilSearchLogs' => $skilSearchLogs,
        ]);
    }

    public function downloadVerifiedCertificates()
    {
        return Excel::download(new VerifiedCertificatesExport, 'verified_certificates.xlsx');
    }

}