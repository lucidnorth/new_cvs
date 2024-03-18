<?php

namespace App\Http\Controllers\Users\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;
use Illuminate\Support\Str;
use App\Models\Institution;
use App\Models\Certificate;
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
    $institution = auth()->user()->my_institution;
    $institutions = Institution::all(); 
    return view('users.UserDashboard', [ 'institution'=> $institution,'institutions'=> $institutions,]);
}

public function profile()
{
    // Fetch the current user's institution information
    $institution = auth()->user()->my_institution  ?? auth()->user()->employer ;
 

    return view('users.UserDashboardProfile', compact('institution'));
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

public function search(Request $request)
{
    $this->validate($request, [
        'institution_id' => 'required|exists:institutions,id',
        'certificate_number' => 'required|string',
    ]);

    $institutionId = $request->input('institution_id');
    $certificateNumber = $request->input('certificate_number');

    $certificate = Certificate::where('institution_id', $institutionId)
        ->where('certificate_number', $certificateNumber)
        ->with('institution') // Assuming 'student' is the relationship name in the Certificate model
        ->first();

    if ($certificate) {
        return redirect()->route('user.dashboard')->with('certificate', $certificate);
    }

    return redirect()->route('user.dashboard')->with('error', 'No matching record found.');
}



    
}
