<?php

namespace App\Http\Controllers;

use App\Models\WorkWithUsApplication;
use App\Models\Advertisement;
use App\Models\ContactUs;
use App\Models\CustomerCare;
use App\Models\VacancyApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WorkWithUsApplicationMail;
use App\Mail\AdvertisementMail;
use App\Mail\ContactUsMail;
use App\Mail\CustomerCareMail;
use App\Mail\CvApplicationMail;
use App\Mail\VacancyApplicationMail;
use App\Models\CvApplication;

class FormsController extends Controller
{
    public function handleWorkWithUsForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'userMessage' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the CV file
        $cvPath = $request->file('cv')->store('cvs');

        // Save the data to the model
        $application = WorkWithUsApplication::create([
            'name' => $validated['name'],
            'message' => $validated['userMessage'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'cv_path' => $cvPath,
        ]);

        // Send the email
        Mail::to('vacancies@certverification.com')->send(new WorkWithUsApplicationMail($application, $request->file('cv')));

        // Return a success response or redirect
        return redirect()->back()->with('success','Your application has been submitted successfully.');
    }

    public function handleAdvertisementForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'userMessage' => 'required|string',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        // Optionally, save the data to the database if needed
        $advertisement = Advertisement::create([
            'name' => $validated['name'],
            'message' => $validated['userMessage'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'description' => $validated['description'],
        ]);

        // Prepare the email content
        Mail::to('ads@certverification.com')->send(new AdvertisementMail($validated));

        // Return a success response or redirect
        return redirect()->back()->with('success', 'Your advertisement has been submitted successfully.');
    }

    public function handleContactUsForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'contactMethod' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'userMessage' => 'required|string',
        ]);

        // Save the data to the model
        $contact = ContactUs::create([
            'contact_method' => $validated['contactMethod'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['userMessage'],
        ]);

        // Send the email
        Mail::to('contact@certverification.com')->send(new ContactUsMail($contact));

        // Return a success response or redirect
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function handleCustomerCareForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'issue' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'userMessage' => 'required|string',
        ]);

        // Save the data to the model
        $customerCare = CustomerCare::create([
            'issue' => $validated['issue'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['userMessage'],
        ]);

        // Optionally, send an email
        Mail::to('customercare@certverification.com')->send(new CustomerCareMail($customerCare));

        // Return a success response or redirect
        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }

    public function handleVacancyForm(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'vacancy' => 'required|string',
            'name' => 'required|string|max:255',
            'userMessage' => 'required|string',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store the CV file
        $cvPath = $request->file('cv')->store('cvs');

        // Save the data to the database
        $application = VacancyApplication::create([
            'vacancy' => $validated['vacancy'],
            'name' => $validated['name'],
            'message' => $validated['userMessage'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'cv_path' => $cvPath,
        ]);

        // Send the email
        Mail::to('vacancies@certverification.com')->send(new VacancyApplicationMail($application));

        // Return a success response
        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }

    // public function submitCv(Request $request)
    // {
    //     // Validate the form data
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'message' => 'required|string',
    //         'phone' => 'required|string|max:20',
    //         'country' => 'required|string|max:100',
    //         'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',  // Example: restrict to 2MB
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('cv')) {
    //         $cvPath = $request->file('cv')->store('cvs');
    //     }

    //     // Process the form data
    //     // You can save the data to the database, send an email, etc.
    //     // Example: return success message or redirect
    //     return redirect()->back()->with('success', 'CV submitted successfully!');
    // }

    public function submitCv(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',  // Restrict to 2MB
        ]);

        // Store the CV file
        $cvPath = $request->file('cv')->store('cvs');

        // Save the data to the database (Assuming you have a model for this)
        $application = CvApplication::create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'cv_path' => $cvPath,
        ]);

        // Send the email (Assuming you have set up a Mailable class)
        Mail::to('applications@company.com')->send(new CvApplicationMail($application));

        // Return a success response
        return redirect()->back()->with('success', 'Your CV has been submitted successfully.');
    }


}