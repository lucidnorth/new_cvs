<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paper;
use App\Models\Institution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class UserDashboardPapersController extends Controller
{
    // public function index()
    // {
    //     $user = auth()->user();
    //     $institution = $user->my_institution;
    //     $papers = $institution->papers;
    //     return view('users.UserDashboardPapers',[ 'papers'=> $papers]);

    // }

    public function index()
    {
        $user = auth()->user();
        $institution = $user->my_institution;
        $papers = $institution->papers;

        return view('users.UserDashboardPapers', ['papers' => $papers]);
    }

    // $institution = auth()->user()->my_institution;

    public function upload(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            // 'file' => 'required|mimes:pdf|max:2048', // PDF file, max size 2MB
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx',
        ]);

        // Get the authenticated user's ID
        $user = auth()->user();

        // Handle file upload
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $fileName); // Save file to storage

        // Create a new Paper instance and save to database
        $paper = new Paper;
        $paper->name = $request->input('name');
        $paper->category = $request->input('category');
        $paper->description = $request->input('description');
        $paper->file = $fileName; // Save file name to database
        $paper->user_id = $user->id;  // Assign the user ID to the paper
        $paper->save();

        return redirect()->back()->with('success', 'Paper uploaded successfully!');
    }


    public function download(Paper $paper)
    {
        $filePath = storage_path('app/uploads/' . $paper->file);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Serve the file for download
            return response()->download($filePath, $paper->name . '.pdf');
        } else {
            // File not found, redirect back with error message
            return redirect()->back()->with('error', 'File not found.');
        }
    }
    
    public function viewPaper($id)
    {
        $paper = Paper::findOrFail($id);

        // Assuming papers are stored in storage/app/public/papers/
        $pathToFile = storage_path('app/uploads/' . $paper->file);

        if (!File::exists($pathToFile)) {
            abort(404);
        }

        return response()->file($pathToFile);
    }
}
