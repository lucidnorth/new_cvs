<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Certificate;
use Gate;
use Illuminate\Http\Request;


class UserDashboardSearchCertificate extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('search_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Retrieve the authenticated user's institution
        // $institution = auth()->user()->my_institution;
        $institutions = Institution::all();

        
        return view('users.UserDashboardSearchCertificate', [ 'institution'=> $institutions,]);
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
        return redirect()->route('SearchCertificate')->with('certificate', $certificate);
    }

    return redirect()->route('SearchCertificate')->with('error', 'No matching record found.');
}
}
