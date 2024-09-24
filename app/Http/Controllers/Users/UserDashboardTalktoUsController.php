<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TalkToUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UserDashboardTalktoUsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        // Create a new record in the database
        $contact = talktous::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'recipient' => $request->input('recipient'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been saved.');
    }
}

