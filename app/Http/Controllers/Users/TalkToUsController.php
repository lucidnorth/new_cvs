<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'recipient' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        // Send email
        Mail::raw($contact->message, function ($message) use ($contact) {
            $message->to($contact->recipient)
                    ->subject($contact->subject)
                    ->from($contact->email, $contact->name);
        });

        return redirect()->back()->with('success', 'Your message has been sent.');
    }
}
