<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PapersUpload;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image file, max size 2MB
        ]);

        // Get the authenticated user's ID
        $user = auth()->user();  
        
        // Handle file uploads
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $fileName); // Save file to storage
        } else {
            return redirect()->back()->with('error', 'Please upload a file.');
        }

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // Save image to storage/public/images
        } else {
            return redirect()->back()->with('error', 'Please upload an image.');
        }
    
        // Create a new Paper instance and save to database
        $paper = new PapersUpload;
        $paper->name = $request->input('name');
        $paper->category = $request->input('category');
        $paper->description = $request->input('description');
        $paper->file = $fileName; // Save file name to database
        $paper->image_path = 'storage/images/' . $imageName; // Save image path to database
        $paper->user_id = $user->id;  // Assign the user ID to the paper
        $paper->save();
            
        return redirect()->back()->with('success', 'Paper uploaded successfully!');
    }

    public function download($id)
    {
        $paper = PapersUpload::findOrFail($id);
        $filePath = 'public/uploads/' . $paper->file;

        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

    public function view($id)
    {
        // Find the paper by ID
        $paper = PapersUpload::findOrFail($id);
        
        // Build the file path
        $filePath = 'public/uploads/' . $paper->file;

        // Check if the file exists
        if (Storage::exists($filePath)) {
            // Return the file as a streamed response
            return new StreamedResponse(function () use ($filePath) {
                $file = Storage::get($filePath);
                echo $file;
            }, 200, [
                'Content-Type' => Storage::mimeType($filePath),
                'Content-Disposition' => 'inline; filename="' . $paper->file . '"',
            ]);
        } else {
            // Redirect back with an error if the file is not found
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
