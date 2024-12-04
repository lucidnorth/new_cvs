<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;

class AboutpageController extends Controller
{
    public function index()
    {
        $integrity = ContentPage::with('tags')->where('title', 'Integrity')->first();

        $mission = ContentPage::with('tags')->where('title', 'Mission')->first();

        $vision = ContentPage::with('tags')->where('title', 'Vision')->first();

        // $newsContent = ContentPage::all()->where('categories', 'News')->first();
        $aboutPageContent = ContentPage::whereHas('categories', function ($query) {
            $query->where('name', 'About Page'); // Assuming your category is stored in a related table
        })->get();

        $faqs = ContentPage::whereHas('categories', function ($query) {
            $query->where('name', 'FAQs'); // Assuming your category is stored in a related table
        })->get();


        // Ensure you're passing the correct variable to the view
        return view('about', compact('aboutPageContent', 'faqs', 'mission', 'vision', 'integrity'));
    }
}
