<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PapersUpload;

class SkillsController extends Controller
{
    public function index($category)
    {
         // Retrieve the authenticated user's institution
         $papers = PapersUpload::where('category', $category)->get();

         return view('skills', ['papers' => $papers]);
    }
}
