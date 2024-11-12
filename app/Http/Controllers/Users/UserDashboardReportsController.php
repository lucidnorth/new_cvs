<?php

namespace App\Http\Controllers\Users;

use App\Exports\IndustryCaseStudyPapersExport;
use App\Exports\InstitutionPaymentsExport;
use App\Exports\ResearchPapersExport;
use App\Exports\VerifiedCertificatesExport;
use App\Exports\InstitutionVerifiedCertificatesExport;
use App\Exports\UserPackagesExport;
use App\Exports\UserPaperExport;
use App\Exports\SkillsGapSetPapersExport;
use App\Exports\SkillSearchLogExport;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Finance;
use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SkillSearchLog;
use App\Models\UserPackage;
use App\Models\Paper;
use App\Models\PapersUpload;
use App\Models\UserPackageInstitution;
use Illuminate\Support\Facades\Log;

class UserDashboardReportsController extends Controller
{
    public function reports()
    {
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
        
        $skillSearchLogs = SkillSearchLog::where('user_id', $userId)->get();

        $userPackages = UserPackage::where('user_id', $userId)->get();

        $userPapers = Paper::where('user_id', $userId)->get();

        $caseStudyPapers = Paper::where([
            ['user_id', '=', $userId],
            ['category', '=', 'Case Study'],
        ])->get();

        $researchPaperPapers = Paper::where([
            ['user_id', '=', $userId],
            ['category', '=', 'Research Paper'],
        ])->get();

        $skillsGapSetPapers = Paper::where([
            ['user_id', '=', $userId],
            ['category', '=', 'Skills Gap Set'],
        ])->get();

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
                ->whereHas('certificate', function ($query) use ($institution) {
                    $query->where('institution_id', $institution->id);
                })
                ->with('certificate')
                ->get();
        }

        if ($institution) {
            // Fetch payments and calculate total amount
            $payments = Finance::where('institution', $institution->institutions)->get();
            $totalAmount = $payments->sum('amount');

        

            // Log data for debugging
            Log::info('Payment Data:', [
                'totalAmount' => $totalAmount,
                
            ]);

            $paymentData = [
                'totalAmount' => $totalAmount,
            ];

        }
       
        return view('users.UserDashboardReports', [
            // 'reports' => $reports,
            'certificates' => $certificates,
            'skillSearchLogs' => $skillSearchLogs,
            'userPackages' => $userPackages,
            'userPapers'=> $userPapers,
            'caseStudyPapers' => $caseStudyPapers,
            'researchPaperPapers'=> $researchPaperPapers,
            'skillsGapSetPapers'=> $skillsGapSetPapers,
            'institutionCertificates' => $institutionCertificates,
            // 'paymentData' => $paymentData,
            // 'payments' => $payments,
        ]);
    }

    public function downloadVerifiedCertificates()
    {
        return Excel::download(new VerifiedCertificatesExport, 'verified_certificates.xlsx');
    }

    public function downloadUserPackages()
    {
        return Excel::download(new UserPackagesExport, 'user_packages_report.xlsx');
    }

    public function downloadIndustryCaseStudyPapers()
    {
        return Excel::download(new IndustryCaseStudyPapersExport, 'industry_case_study_papers.xlsx');
    }

    public function downloadResearchPapers()
    {
        return Excel::download(new ResearchPapersExport, 'research_papers.xlsx');
    }

    public function downloadSkillsGapSetPapers()
    {
        return Excel::download(new SkillsGapSetPapersExport, 'skills_gap_set_papers.xlsx');
    }

    // public function downloadUserPapers()
    // {
    //     return Excel::download(new UserPaperExport, 'user_papers_report.xlsx');
    // }

    public function downloadSkillSearchLogs()
    {
        $userId = Auth::id();
        return Excel::download(new SkillSearchLogExport($userId), 'skill_search_logs.xlsx');
    }

    public function downloadInstitutionCertificates()
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
                ->whereHas('certificate', function ($query) use ($institution) {
                    $query->where('institution_id', $institution->id);
                })
                ->with('certificate')
                ->get();
        }

        return Excel::download(new InstitutionVerifiedCertificatesExport($institutionCertificates), 'institution_certificates_report.xlsx');
    }

    public function downloadInstitutionPayments()
    {
        $user = auth()->user();
        $institution = $user->my_institution;
        
        if ($institution) {
            // Fetch all payments for the institution
            $payments = Finance::where('institution', $institution->institutions)
                ->orderBy('created_at', 'asc')
                ->get();
        } else {
            // Handle the case where the institution is not found
            return redirect()->back()->with('error', 'No institution found.');
        }

        return Excel::download(new InstitutionPaymentsExport($institution), 'institution_payments_report.xlsx');
    }


}