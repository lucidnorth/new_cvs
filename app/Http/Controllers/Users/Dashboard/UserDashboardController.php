<?php

namespace App\Http\Controllers\Users\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;
use Illuminate\Support\Str;
use App\Models\Institution;
use App\Models\Certificate;
use App\Models\SearchLog;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Chartisan\PHP\Chartisan;
use App\Models\Finance;
use Illuminate\Support\Facades\Http;



class UserDashboardController extends Controller
{
    // public function getTitle(Request $request)
    // {
    //        // Determine the route name of the current request
    //        $route = $request->route()->getName();
    //         // Get the page title based on the route
    //      $pageTitle = $this->getTitle($route);
    //     // Convert route name to human-readable title
    //     $allpageTitle = Str::title(str_replace('.', ' ',  $pageTitle));
    //     // You can further customize the title if needed based on the route
    //     // return $title;
    //     return view( [
    //         'allpageTitle' => $allpageTitle,]);
    // }
    

    public function index()
    {
        $user = auth()->user();
        $institution = $user->my_institution;
        $institutions = Institution::all();
    
        // Count the number of papers uploaded by the authenticated user
        $papersCount = Paper::where('user_id', $user->id)->count();
    
        // Count the number of searches performed by the authenticated user
        $searchCount = SearchLog::where('user_id', $user->id)->count();
    
        // Fetch the latest 5 search logs by the authenticated user
        $userId = Auth::id();
        $searchLogs = SearchLog::where('user_id', $userId)
            ->orderBy('created_at', 'desc') // Order by creation date, most recent first
            ->take(5) // Limit to 5 logs
            ->get();
    
        // Initialize an empty collection to store certificates
        $certificates = collect();
        $qualificationTypes = [];
    
        // Loop through each search log and fetch related certificates
        foreach ($searchLogs as $log) {
            $certificate = Certificate::where('certificate_number', $log->search_term)
                ->with('institution')
                ->first();
    
            if ($certificate) {
                $certificates->push($certificate);
                $qualificationTypes[] = $certificate->qualification_type;
            }
        }
    
        // Count occurrences of each qualification type
        $qualificationTypeCounts = array_count_values($qualificationTypes);
    
        // Initialize institutionSearchCount, maleCount, femaleCount, and institutionCertificateCount
        $institutionSearchCount = 0;
        $maleCount = 0;
        $femaleCount = 0;
        $institutionCertificateCount = 0;
        $institutionQualificationTypes = [];
    
        if ($institution) {
            // Get all certificate numbers associated with this institution
            $certificateNumbers = Certificate::where('institution_id', $institution->id)
                ->pluck('certificate_number')
                ->toArray();
    
            if (count($certificateNumbers) > 0) {
                // Fetch search logs that match the certificate numbers
                $searchLogs = SearchLog::whereIn('search_term', $certificateNumbers)
                    ->whereHas('certificate', function ($query) use ($institution) {
                        $query->where('institution_id', $institution->id);
                    })
                    ->with('certificate')
                    ->get();
    
                // Count the number of searches related to the institution's certificates
                $institutionSearchCount = $searchLogs->count();
    
                // Count males and females from the search logs
                foreach ($searchLogs as $log) {
                    if ($log->certificate && $log->certificate->gender) {
                        if ($log->certificate->gender === 'Male') {
                            $maleCount++;
                        } elseif ($log->certificate->gender === 'Female') {
                            $femaleCount++;
                        }
                    }
                }
    
                // Count the number of unique certificates under this institution
                $institutionCertificateCount = Certificate::where('institution_id', $institution->id)->count();
    
                // Fetch qualification types for certificates found in search logs
                foreach ($searchLogs as $log) {
                    if ($log->certificate) {
                        $institutionQualificationTypes[] = $log->certificate->qualification_type;
                    }
                }
            }
        }
    
        $institutionQualificationTypeCounts = array_count_values($institutionQualificationTypes);
    
        // Prepare data for the main chart
        $chart = new Chart;
        $chart->labels(array_keys($qualificationTypeCounts));
        $chart->dataset('Qualification Types', 'pie', array_values($qualificationTypeCounts))
            ->options([
                'backgroundColor' => [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(243, 229, 0, 1)'
                ],
                'borderColor' => [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                'borderWidth' => 1,
                'plugins' => [
                    'datalabels' => [
                        'formatter' => function ($value) use ($qualificationTypeCounts) {
                            $total = array_sum($qualificationTypeCounts);
                            $percentage = ($value / $total) * 100;
                            return number_format($percentage, 1) . '%';
                        },
                        'color' => '#fff',
                    ]
                ],
                'scales' => [
                    'x' => [
                        'display' => false
                    ],
                    'y' => [
                        'display' => false
                    ]
                ]
            ]);
    
        // Prepare data for the institution certificates chart
        $institutionCertsChart = new Chart;
        $institutionCertsChart->labels(array_keys($institutionQualificationTypeCounts));
        $institutionCertsChart->dataset('Institution Certs', 'pie', array_values($institutionQualificationTypeCounts))
            ->options([
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(243, 229, 0, 0.6)'
                ],
                'borderColor' => [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(243, 229, 0, 1)'
                ],
                'borderWidth' => 1,
                'plugins' => [
                    'datalabels' => [
                        'formatter' => function ($value) use ($institutionQualificationTypeCounts) {
                            $total = array_sum($institutionQualificationTypeCounts);
                            $percentage = ($value / $total) * 100;
                            return number_format($percentage, 1) . '%';
                        },
                        'color' => '#fff',
                    ]
                ],
                'scales' => [
                    'x' => [
                        'display' => false
                    ],
                    'y' => [
                        'display' => false
                    ]
                ]
            ]);
    
        // Fetch payments related to the institution
        $payments = Finance::where('institution', $institution->institutions)->get();
    
        return view('users.UserDashboard', [
            'institution' => $institution,
            'institutions' => $institutions,
            'papersCount' => $papersCount,
            'searchCount' => $searchCount,
            'certificates' => $certificates,
            'chart' => $chart,
            'qualificationTypeCounts' => $qualificationTypeCounts,
            'institutionSearchCount' => $institutionSearchCount,
            'institutionCertificateCount' => $institutionCertificateCount,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'institutionCertsChart' => $institutionCertsChart,
            'institutionQualificationTypeCounts' => $institutionQualificationTypeCounts,
            'payments' => $payments  // Pass payments data to the view
        ]);
    }
    

public function profile()
{
    // Fetch the current user's institution information
    $data = auth()->user()->my_institution  ?? auth()->user()->employer ;
 

    return view('users.UserDashboardProfile', compact('data'));
}


public function papers()
{
    // // Fetch the currently authenticated user
    // $user = auth()->user();

    // // Fetch papers posted by the currently authenticated user
    // $papers = Paper::where('user_id', $user->id)->get() ;

    // Pass the papers data to the view
    // return view('users.UserDashboardPapers', ['papers' => $papers]);

    $user = auth()->user();
    $papers = $user->papers()->orderBy('created_at', 'desc')->take(10)->get();
    
    $allpapers = Paper::orderBy('created_at', 'desc')->take(20)->get();

    return view('users.UserDashboardPapers', ['papers' => $papers,'allpapers' => $allpapers]);
}


public function UploadCertificate()
{
    return view('users.UserDashboardUploadCertificate');
}


public function SearchCertificate()
{
    $institutions = Institution::all();

    return view('users.UserDashboardSearchCertificate', [ 'institution'=> $institutions]);
}


public function packages()
{

    $userId = auth()->id();
    $user = User::find($userId); 
    $activePackage = $user->activePackage();

    $packages = Package::all();    
    return view('users.UserDashboardPackages', [
        'packages' => $packages,
        'activePackage' => $activePackage
        
    ]);
}



// public function verified()
// {
//         $userId = Auth::id();

//         // Fetch all search logs by the authenticated user
//         $searchLogs = SearchLog::where('user_id', $userId)->get();

//         // Initialize an empty collection to store certificates
//         $certificates = collect();

//         // Loop through each search log and fetch related certificates
//         foreach ($searchLogs as $log) {
//             $certificate = Certificate::where('certificate_number', $log->search_term)
//                 ->with('institution')
//                 ->first();
            
//             if ($certificate) {
//                 $certificates->push($certificate);
//             }
//         }

//     return view('Users.UserDashboardVerified', ['certificates' => $certificates]);
// }
public function verified()
{
    $userId = Auth::id();

    // Fetch all search logs by the authenticated user
    $searchLogs = SearchLog::where('user_id', $userId)->get();

    // Initialize an empty collection to store certificates
    $certificates = collect();

     // Count the number of searches performed by the authenticated user
     $searchCount = SearchLog::where('user_id', $userId)->count();

    // Initialize counters for male and female certificates
    $maleCount = 0;
    $femaleCount = 0;

    // Loop through each search log and fetch related certificates
    foreach ($searchLogs as $log) {
        $certificate = Certificate::where('certificate_number', $log->search_term)
            ->with('institution')
            ->first();
        
        if ($certificate) {
            $certificates->push($certificate);

            // Count male and female certificates
            if ($certificate->gender === 'Male') {
                $maleCount++;
            } elseif ($certificate->gender === 'Female') {
                $femaleCount++;
            }
        }
    }

    // Pass the certificates and gender counts to the view
    return view('Users.UserDashboardVerified', [
        'certificates' => $certificates,
        'maleCount' => $maleCount,
        'femaleCount' => $femaleCount,
        'searchCount'=>$searchCount,
    ]);
}



public function SkillSearch()
{
    $packages = Package::all();

    return view('Users.UserDashboardSkillSearch', [ 'packages'=> $packages,]);
}


// public function search(Request $request)
// {
//     $this->validate($request, [
//         'institution_id' => 'required|exists:institutions,id',
//         'certificate_number' => 'required|string',
//     ]);

//     $institutionId = $request->input('institution_id');
//     $certificateNumber = $request->input('certificate_number');

//      // Log the search
//      SearchLog::create([
//         'user_id' => auth()->id(),
//         'search_term' => $certificateNumber,
//     ]);

//     $certificate = Certificate::where('institution_id', $institutionId)
//         ->where('certificate_number', $certificateNumber)
//         ->with('institution') // Assuming 'student' is the relationship name in the Certificate model
//         ->first();

//     if ($certificate) {
//         return redirect()->route('user.dashboard')->with('certificate', $certificate);
//     }

//     return redirect()->route('user.dashboard')->with('error', 'No matching record found.');
// }


public function search(Request $request)
{
    $this->validate($request, [
        'institution_id' => 'required|exists:institutions,id',
        'certificate_number' => 'required|string',
    ]);

    $userId = auth()->id();
    $user = User::find($userId); 
    $activePackage = $user->activePackage();

    if (!$activePackage) {
        return redirect()->route('user.dashboard')
            ->with('status', 'You do not have an active package.')
            ->with('error_type', 'package');
    }

    if ($activePackage->searches_left <= 0) {
        return redirect()->route('user.dashboard')
            ->with('error', 'You have exhausted your search limit.')
            ->with('error_type', 'package');
    }

    $institutionId = $request->input('institution_id');
    $certificateNumber = $request->input('certificate_number');

    $certificate = Certificate::where('institution_id', $institutionId)
        ->where('certificate_number', $certificateNumber)
        ->with('institution')
        ->first();

    if ($certificate) {

        // Decrement the search count only if a certificate is found
        $activePackage->decrement('searches_left');

        // Log the search
        SearchLog::create([
            'user_id' => $userId,
            'user_package_id' => $activePackage->id,
            'search_term' => $certificateNumber,
        ]);

        return redirect()->route('user.dashboard')->with('certificate', $certificate);
    }

    return redirect()->route('user.dashboard')
        ->with('certificate_error', 'No matching record found.')
        ->with('error_type', 'search');
}

// public function displaySearchCount()
//     {
//         $userId = auth()->id();
//         $userPackage = UserPackage::where('user_id', $userId)->where('payment_status', 'paid')->first();

//         if ($userPackage) {
//             $totalSearchesAllowed = $userPackage->getTotalSearchesAllowed();
//             $searchesLeft = $userPackage->searches_left;
//             $searchesDone = $totalSearchesAllowed - $searchesLeft;

//             return view('user.dashboard', compact('searchesDone', 'searchesLeft', 'totalSearchesAllowed'));
//         } else {
//             return redirect()->route('user.dashboard')->with('error', 'You do not have an active package.');
//         }
//     }

 
public function institutionVerifiedCerticate()
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

public function talktoUs()
{
    $packages = Package::all();

    return view('Users.UserDashboardTalktoUs', [ 'packages'=> $packages,]);
}


public function Payment()
{
    $user = auth()->user();
    $institution = $user->my_institution;
    // $institutions = Institution::all();

    $payments = Finance::where('institution', $institution->institutions)->get();

    return view('Users.UserDashboardPayment', [ 'payments'=> $payments,]);
}




}

