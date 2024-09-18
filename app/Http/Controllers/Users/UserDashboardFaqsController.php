<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;

class UserDashboardFaqsController extends Controller
{
    public function faqs()
    {

 // Fetch FAQs related to Employers
 $employerCategories = FaqCategory::with('questions')
 ->where('category', 'Employer')
 ->get();

 // Fetch FAQs related to Institutions
 $institutionCategories = FaqCategory::with('questions')
 ->where('category', 'Institution')
 ->get();


        $categories = FaqCategory::with('questions')->get();
        
        return view('users.UserDashboardFaqs', ['employerCategories' => $employerCategories,'institutionCategories' => $institutionCategories,]);
    }
}