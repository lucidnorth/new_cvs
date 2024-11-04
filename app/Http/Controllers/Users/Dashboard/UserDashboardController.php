<?php

namespace App\Http\Controllers\Users\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\Institution;
use App\Models\Certificate;
use App\Models\SearchLog;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Finance;
use App\Models\UserPackageInstitution;
use Illuminate\Support\Facades\Log;
use App\Models\Upload;
use GuzzleHttp\Client;



class UserDashboardController extends Controller
{
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
            ->take(6) // Limit to 5 logs
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

        $hasData = !empty( $institutionQualificationTypeCounts);
        $hasData1 = !empty(  $qualificationTypeCounts);

    


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
        $payments = null;
        $amountDue = null;
        if ($institution) {
            $payments = Finance::where('institution', $institution->institutions)->get()->take(3);
            $totalAmount = $payments->sum('amount');


            // Sum up the amount given to the institution for each user package
            $totalAmountGivenToInstitution = UserPackageInstitution::where('institution_id', $institution->id)->sum('amount_given_to_institution');

            // Calculate the amount due
            $amountDue = $totalAmountGivenToInstitution - $totalAmount;
        }

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
            'payments' => $payments,
            'amountDue' => $amountDue,
            'hasData' => $hasData,
            'hasData1' => $hasData1,

            // 'amountDue' => $amountDue,

        ]);
    }


    public function profile()
    {
        // Fetch the current user's institution information
        $data = auth()->user()->my_institution  ?? auth()->user()->employer;
        return view('users.UserDashboardProfile', compact('data'));
    }

    
    public function papers()
    {

        $user = auth()->user();
        $papers = $user->papers()->orderBy('created_at', 'desc')->take(10)->get();
        $allpapers = Paper::orderBy('created_at', 'desc')->take(20)->get();

        return view('users.UserDashboardPapers', ['papers' => $papers, 'allpapers' => $allpapers]);
    }


    public function UploadCertificate()
    
    {
        $user = auth()->user();

        $certs = $user->uploads()->orderBy('created_at', 'desc')->take(10)->get();

        $allcerts =Upload::orderBy('created_at', 'desc')->take(20)->get();

        return view('users.UserDashboardUploadCertificate', ['allpapers' => $allcerts,  'certs' => $certs]);
    }


    // public function SearchCertificate()
    // {
    //     $institutions = Institution::all();

    //     return view('users.UserDashboardSearchCertificate', ['institution' => $institutions]);
    // }


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
        return view('users.UserDashboardVerified', [
            'certificates' => $certificates,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'searchCount' => $searchCount,
        ]);
    }


    public function SkillSearch()
    {
        $packages = Package::all();

        return view('users.UserDashboardSkillSearch', ['packages' => $packages,]);
    }

    // public function search(Request $request)
    // {
    //     $this->validate($request, [
    //         'institution_id' => 'required|exists:institutions,id',
    //         'identifier' => 'required|string',
    //     ]);
    
    //     $userId = auth()->id();
    //     $user = User::find($userId);
    //     $activePackage = $user->activePackage();
    
    //     if (!$activePackage) {
    //         return redirect()->route('user.dashboard')
    //             ->with('status', 'You do not have an active package.')
    //             ->with('error_type', 'package');
    //     }
    
    //     if ($activePackage->searches_left <= 0) {
    //         return redirect()->route('user.dashboard')
    //             ->with('error', 'You have exhausted your search limit.')
    //             ->with('error_type', 'package');
    //     }
    
    //     $institutionId = $request->input('institution_id');
    //     $identifier = $request->input('identifier');
    
    //     // Check the local database for certificate or student ID
    //     $localCertificate = Certificate::where('institution_id', $institutionId)
    //         ->where(function ($query) use ($identifier) {
    //             $query->where('certificate_number', $identifier)
    //                   ->orWhere('student_identification', $identifier);
    //         })
    //         ->with('institution')
    //         ->first();
    
    //     if ($localCertificate) {
    //         $this->handleSuccessfulSearch($activePackage, $institutionId, $identifier, $localCertificate);
    //         session(['certificate' => $localCertificate, 'certificate_source' => 'local']);
    //         return redirect()->route('user.dashboard')->with('certificate', $localCertificate);
    //     }
    
    //     // If not found locally, try the API
    //     $institution = Institution::find($institutionId);
    //     $apiUrl = $institution->api_url;
    
    //     if ($apiUrl) {
    //         try {
    //             $client = new \GuzzleHttp\Client();
    
    //             // Attempt to fetch by Certificate_Number first
    //             $response = $client->request('GET', $apiUrl, [
    //                 'query' => ['Certificate_Number' => $identifier],
    //                 'verify' => false,
    //                 'timeout' => 10,
    //             ]);
    
    //             $responseData = json_decode($response->getBody(), true);
    //             if (is_array($responseData) && count($responseData) > 0) {
    //                 $certificate = $responseData[0];
    //             } else {
    //                 // If no result, attempt to fetch by Student_Identification
    //                 $response = $client->request('GET', $apiUrl, [
    //                     'query' => ['Student_Identification' => $identifier],
    //                     'verify' => false,
    //                     'timeout' => 10,
    //                 ]);
    //                 $responseData = json_decode($response->getBody(), true);
    //                 $certificate = $responseData[0] ?? null;
    //             }
    
    //             if ($certificate) {
    //                 $certificate['institution_logo'] = $institution->logo;
    //                 $certificate['institution_name'] = $institution->institutions;
    //                 $certificate['image'] = $certificate['Photo'] ?? '';
    
    //                 $this->handleSuccessfulSearch($activePackage, $institutionId, $identifier, $certificate);
    //                 session(['certificate' => $certificate, 'certificate_source' => 'api']);
    //                 return redirect()->route('user.dashboard')->with('certificate', $certificate);
    //             } else {
    //                 return redirect()->route('user.dashboard')
    //                     ->with('certificate_error', 'No matching record found via API.');
    //             }
    //         } catch (\Exception $e) {
    //             \Log::error('API error: ' . $e->getMessage());
    //             return redirect()->route('user.dashboard')
    //                 ->with('certificate_error', 'Error connecting to external API: ' . $e->getMessage());
    //         }
    //     }
    
    //     return redirect()->route('user.dashboard')
    //         ->with('certificate_error', 'No matching record found.')
    //         ->with('error_type', 'search');
    // }
    
    public function search(Request $request)
{
    $this->validate($request, [
        'institution_id' => 'required|exists:institutions,id',
        'identifier' => 'required|string',
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
    $identifier = $request->input('identifier');

    // Check the local database for certificate or student ID
    $localCertificate = Certificate::where('institution_id', $institutionId)
        ->where(function ($query) use ($identifier) {
            $query->where('certificate_number', $identifier)
                  ->orWhere('student_identification', $identifier);
        })
        ->with('institution')
        ->first();

    if ($localCertificate) {
        $this->handleSuccessfulSearch($activePackage, $institutionId, $identifier, $localCertificate);
        session(['certificate' => $localCertificate, 'certificate_source' => 'local']);
        return redirect()->route('user.dashboard')->with('certificate', $localCertificate);
    }

    // If not found locally, try the API
    $institution = Institution::find($institutionId);
    $apiUrl = $institution->api_url;

    if ($apiUrl) {
        try {
            $client = new \GuzzleHttp\Client();

            // Attempt to fetch by Certificate_Number first
            $response = $client->request('GET', $apiUrl, [
                'query' => ['Certificate_Number' => $identifier],
                'verify' => false,
                'timeout' => 10,
            ]);

            $responseData = json_decode($response->getBody(), true);
            if (is_array($responseData) && count($responseData) > 0) {
                $certificate = $responseData[0];
            } else {
                // If no result, attempt to fetch by Student_Identification
                $response = $client->request('GET', $apiUrl, [
                    'query' => ['Student_Identification' => $identifier],
                    'verify' => false,
                    'timeout' => 10,
                ]);
                $responseData = json_decode($response->getBody(), true);
                $certificate = $responseData[0] ?? null;
            }

            if ($certificate) {
                $certificate['institution_logo'] = $institution->logo;
                $certificate['institution_name'] = $institution->institutions;
                $certificate['image'] = $certificate['Photo'] ?? '';

                $this->handleSuccessfulSearch($activePackage, $institutionId, $identifier, $certificate);
                session(['certificate' => $certificate, 'certificate_source' => 'api']);
                return redirect()->route('user.dashboard')->with('certificate', $certificate);
            } else {
                return redirect()->route('user.dashboard')
                    ->with('certificate_error', 'No matching record found via API.');
            }
        } catch (\Exception $e) {
            \Log::error('API error: ' . $e->getMessage());
            return redirect()->route('user.dashboard')
                ->with('certificate_error', 'Error connecting to external API: ' . $e->getMessage());
        }
    }

    return redirect()->route('user.dashboard')
        ->with('certificate_error', 'No matching record found.')
        ->with('error_type', 'search');
}

    


 private function handleSuccessfulSearch($activePackage, $institutionId, $certificateNumber, $certificate)
    {
        // Decrement the search count
        $activePackage->decrement('searches_left');
    
        // Calculate the amount for each search and update the institution's balance
        $pricePerSearch = $activePackage->amount / $activePackage->getTotalSearchesAllowed();
        $amountToGiveToInstitution = $pricePerSearch * 0.5;
    
        // Save the amount given to the institution for this search
        $userPackageInstitution = new UserPackageInstitution();
        $userPackageInstitution->user_package_id = $activePackage->id;
        $userPackageInstitution->institution_id = $institutionId;
        $userPackageInstitution->amount_given_to_institution = $amountToGiveToInstitution;
        $userPackageInstitution->save();
    
        // Log the search
        SearchLog::create([
            'user_id' => auth()->id(),
            'user_package_id' => $activePackage->id,
            'search_term' => $certificateNumber,
        ]);
    }

    

    public function talktoUs()
    {
        $packages = Package::all();

        return view('users.UserDashboardTalktoUs', ['packages' => $packages,]);
    }


    // public function Payment()
    // {
    //     $user = auth()->user();
    //     $institution = $user->my_institution;

    //     if ($institution) {
    //         // Log institution details
    //         Log::info('Institution Details:', ['institution_id' => $institution->id, 'institution_name' => $institution->name]);

    //         $payments = Finance::where('institution', $institution->institutions)->get();
    //         $totalAmount = $payments->sum('amount');

    //         // Fetch the amount given to the institution for each user package
    //         $userPackages = UserPackage::whereHas('user', function ($query) use ($institution) {
    //             $query->where('institution_id', $institution->id);
    //         })->get(['amount_given_to_institution', 'created_at']);

    //         // Log user packages
    //         Log::info('User Packages:', $userPackages->toArray());

    //         // Check if userPackages are empty
    //         if ($userPackages->isEmpty()) {
    //             Log::warning('No user packages found for institution:', ['institution_id' => $institution->id]);
    //         }

    //         return view('Users.UserDashboardPayment', [
    //             'payments' => $payments,
    //             'totalAmount' => $totalAmount,
    //             'userPackages' => $userPackages,
    //         ]);
    //     } else {
    //         // Log error if no institution is found
    //         Log::error('No institution found for user:', ['user_id' => $user->id]);

    //         return redirect()->route('user.dashboard')->with('error', 'No institution found.');
    //     }
    // }


    public function Payment()
    {
        $user = auth()->user();
        $institution = $user->my_institution;

        if ($institution) {
            // Fetch payments and calculate total amount
            $payments = Finance::where('institution', $institution->institutions)->get();
            $totalAmount = $payments->sum('amount');

            // Sum up the amount given to the institution for each user package
            $totalAmountGivenToInstitution = UserPackageInstitution::where('institution_id', $institution->id)->sum('amount_given_to_institution');

            // Calculate the amount due
            $amountDue = $totalAmountGivenToInstitution - $totalAmount;

            // Log data for debugging
            Log::info('Payment Data:', [
                'totalAmount' => $totalAmount,
                'totalAmountGivenToInstitution' => $totalAmountGivenToInstitution,
                'amountDue' => $amountDue,
            ]);

            return view('Users.UserDashboardPayment', [
                'payments' => $payments,
                'totalAmount' => $totalAmount,
                'totalAmountGivenToInstitution' => $totalAmountGivenToInstitution,
                'amountDue' => $amountDue,
            ]);
        } else {
            return redirect()->route('user.dashboard')->with('error', 'No institution found.');
        }
    }
}
