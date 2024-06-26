<?php

// app/Http/Controllers/Users/UserDashboardTalkToUsController.php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TalkToUs;

class UserDashboardTalkToUsController extends Controller
{
    public function talkToUs()
    {
        $talkToUs = TalkToUs::all();
        return view('users.UserDashboardTalkToUs', ['talkToUs' => $talkToUs]);
    }


    // Optional: Add store method if handling form submissions
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        TalkToUs::create($validatedData);

        return redirect()->route('user-dashboard.talk-to-us')->with('success', 'Your message has been submitted.');
    }
}