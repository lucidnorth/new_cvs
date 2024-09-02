<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class UserDashboardUploadCertificateController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $certs = $user->uploads()->orderBy('created_at', 'desc')->take(10)->get();       
        $allcerts =Upload::orderBy('created_at', 'desc')->take(20)->get();
        return view('users.UserDashboardUploadCertificate' , ['allpapers' => $allcerts,  'certs' => $certs]);
    }
    

    public function upload(Request $request)
    {
        DB::beginTransaction();
        try {
 
            // Validate the form data
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Excel file, max size 2MB
            ]);

            // Get the authenticated user's ID
            $user = auth()->user();

            // Handle file upload
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName); // Save file to storage

            // Create a new Upload instance and save to database
            $upload = new Upload();
            $upload->title = $request->input('title');
            $upload->description = $request->input('description');
            $upload->file = $fileName; // Save file name to database
            $upload->user_id = $user->id;  // Assign the user ID to the upload
            $upload->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
        }

        // Provide feedback to the user
        return redirect()->back()->with('success', 'File uploaded successfully!');
    }



    
    public function download($id)
    {
        // Find the upload by ID
        $upload = Upload::findOrFail($id);
    
        // Get the file path from storage
        $filePath = storage_path('app/public/' . $upload->file);
    
        // Check if the file exists
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    


    public function viewPaper($id)
    {
        $certificate = Upload::findOrFail($id);

        // Assuming papers are stored in storage/app/public/papers/
        $pathToFile = storage_path('app/uploads/' . $certificate->file);

        if (!File::exists($pathToFile)) {
            abort(404);
        }

        return response()->file($pathToFile);
    }
}
