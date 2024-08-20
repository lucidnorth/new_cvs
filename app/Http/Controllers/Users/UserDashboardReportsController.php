<?php

namespace App\Http\Controllers\Users;

use App\Exports\IndustryCaseStudyPapersExport;
use App\Exports\ResearchPapersExport;
use App\Exports\VerifiedCertificatesExport;
use App\Exports\UserPackagesExport;
use App\Exports\UserPaperExport;
use App\Exports\SkillsGapSetPapersExport;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Report;
use App\Models\SearchLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SkillSearchLog;
use App\Models\UserPackage;
use App\Models\Paper;
use App\Models\PapersUpload;


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
        
        $skilSearchLogs = SkillSearchLog::where('user_id', $userId)->get();

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
       
        return view('users.UserDashboardReports', [
            // 'reports' => $reports,
            'certificates' => $certificates,
            'skilSearchLogs' => $skilSearchLogs,
            'userPackages' => $userPackages,
            'userPapers'=> $userPapers,
            'caseStudyPapers' => $caseStudyPapers,
            'researchPaperPapers'=> $researchPaperPapers,
            'skillsGapSetPapers'=> $skillsGapSetPapers
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

}