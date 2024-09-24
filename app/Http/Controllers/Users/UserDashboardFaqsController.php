<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;

class UserDashboardFaqsController extends Controller
{
    public function faqs()
    {
        $categories = FaqCategory::with('questions')->get();
        
        return view('users.UserDashboardFaqs', ['categories' => $categories]);
    }
}