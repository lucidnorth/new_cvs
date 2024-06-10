<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PapersUpload;

class SkillsController extends Controller
{
    public function index()
    {
        // Fetch papers for each category separately using Eloquent
        $caseStudyPapers = PapersUpload::where('category', 'Case Study')->get();
        $researchPaperPapers = PapersUpload::where('category', 'Research Paper')->get();
        $skillsGapSetPapers = PapersUpload::where('category', 'Skills Gap Set')->get();

        // Pass the fetched data to the view
        return view('skills', compact('caseStudyPapers', 'researchPaperPapers', 'skillsGapSetPapers'));
    }
}
