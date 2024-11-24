<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch the content for the banner (single record or first match)
        $bannerContent = ContentPage::all();
    
        // Ensure you're passing the correct variable to the view
        return view('index', compact('bannerContent'));
    }
}
