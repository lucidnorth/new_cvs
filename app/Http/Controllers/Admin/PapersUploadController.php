<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PapersUpload;

class PapersUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048', // PDF file, max size 2MB
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file, max size 2MB
        ]);
        
        // Get the authenticated user's ID
        $user = auth()->user();  
        
        // Handle file uploads
        $file = $request->file('file');
        $image = $request->file('image');
    
        $fileName = time() . '_' . $file->getClientOriginalName();
        $imageName = time() . '_' . $image->getClientOriginalName();
    
        $file->storeAs('uploads', $fileName); // Save file to storage
        $image->storeAs('images', $imageName); // Save image to storage
    
        // Create a new Paper instance and save to database
        $paper = new PapersUpload;
        $paper->name = $request->input('name');
        $paper->category = $request->input('category');
        $paper->description = $request->input('description');
        $paper->file = $fileName; // Save file name to database
        $paper->image = $imageName; // Save image name to database
        $paper->user_id = $user->id;  // Assign the user ID to the paper
        $paper->save();
            
        return redirect()->back()->with('success', 'Paper uploaded successfully!');
    }
    
}
 