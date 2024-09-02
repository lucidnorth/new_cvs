<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WorkWithUsApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $cvFile;

    public function __construct($application, $cvFile)
    {
        $this->application = $application;
        $this->cvFile = $cvFile;
    }

    public function build()
    {
        return $this->from('malikbyussif@gmail.com') 
            ->view('emails.workwithus_application')
            ->with([
                'name' => $this->application->name,
                'userMessages' => $this->application->message,
                'phone' => $this->application->phone,
                'country' => $this->application->country,
            ])
            ->attach($this->cvFile->getPathname(), [
                'as' => $this->cvFile->getClientOriginalName(),
                'mime' => $this->cvFile->getMimeType(),
            ]);
    }
}