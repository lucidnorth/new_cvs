<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterSubscribed;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store the email in the database (assuming a Newsletter model)
        \App\Models\Newsletter::create([
            'email' => $request->email,
        ]);

        // Send an email notification
        Mail::to('malikbyussif@gmail.com')->send(new NewsletterSubscribed($request->email));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
