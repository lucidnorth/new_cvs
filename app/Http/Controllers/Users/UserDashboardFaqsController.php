<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\FaqQuestion;
use Illuminate\Http\Request;

class UserDashboardFaqsController extends Controller
{
    public function faqs()
    {
        $faqs = FaqQuestion::all();
        
        return view('users.UserDashboardFaqs', ['faqs' => $faqs]);
    }
}