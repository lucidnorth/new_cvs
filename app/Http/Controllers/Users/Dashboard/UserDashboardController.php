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
use App\Models\TalkToUs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;

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
    

public function index( )
{
    $user = auth()->user();
    $institution = auth()->user()->my_institution;
    $institutions = Institution::all(); 

            // Count the number of papers uploaded by the authenticated user
    $papersCount = Paper::where('user_id', $user->id)->count();

     // Count the number of searches performed by the authenticated user
     $searchCount = SearchLog::where('user_id', $user->id)->count();

    return view('users.UserDashboard', [ 'institution'=> $institution,'institutions'=> $institutions, 'papersCount' => $papersCount, 'searchCount' => $searchCount,]);
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
    $packages = Package::all();

    return view('Users.UserDashboardPackages', [ 'packages'=> $packages,]);
}


public function verified()
{
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

    return view('Users.UserDashboardVerified', ['certificates' => $certificates]);
}

public function talk_to_us()
{
    $talkToUs = TalkToUs::all();

    return view('Users.UserDashboardTalkToUs', [ 'talkToUs'=> $talkToUs]);
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
    
}