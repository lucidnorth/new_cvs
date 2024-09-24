<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserDashboardUploadCertificate extends Controller
{
    public function upload(Request $request)
{
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

    // Provide feedback to the user
    return redirect()->back()->with('success', 'File uploaded successfully!');
} 
    
    
    
    
    
    
    
    
    
    
}
