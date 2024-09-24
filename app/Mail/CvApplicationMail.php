<?php

namespace App\Mail;

use App\Models\CvApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CvApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(CvApplication $application)
    {
        $this->application = $application;
    }

    public function build()
    {
        return $this->view('emails.cv_application')
            ->subject('New CV Application Received')
            ->with([
                'name' => $this->application->name,
                'userMessage' => $this->application->message,
                'phone' => $this->application->phone,
                'country' => $this->application->country,
            ]);
    }
}
