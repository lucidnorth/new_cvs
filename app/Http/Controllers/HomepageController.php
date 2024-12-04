<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // Fetch the content for the banner (single record or first match)
        $bannerContent = ContentPage::with('tags')->where('title', 'Banner')->first();

        // $newsContent = ContentPage::all()->where('categories', 'News')->first();
        $newsContent = ContentPage::whereHas('categories', function ($query) {
            $query->where('name', 'News'); // Assuming your category is stored in a related table
        })->get();

        $services = ContentPage::where('title', 'Services')->first();


        // Ensure you're passing the correct variable to the view
        return view('index', compact('bannerContent', 'newsContent', 'services'));
    }
}
