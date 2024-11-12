<?php

namespace App\Http\Controllers;

use App\Models\ContentPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // Fetching content for the homepage
        $featuredContent = ContentPage::where('is_featured', true)
            ->with(['categories', 'tags', 'media'])
            ->latest()
            ->take(5)
            ->get();

        $latestContent = ContentPage::with(['categories', 'tags', 'media'])
            ->latest()
            ->take(10)
            ->get();

        // Passing the content to the view
        return view('index', compact('featuredContent', 'latestContent'));
    }
}
