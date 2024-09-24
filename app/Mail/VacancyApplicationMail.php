<?php

namespace App\Mail;

use App\Models\VacancyApplication;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VacancyApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(VacancyApplication $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('malikbyussif@gmail.com') 
                    ->markdown('emails.vacancy_application')
                    ->subject('New Vacancy Application')
                    ->attach(storage_path('app/' . $this->application->cv_path), [
                        'as' => basename($this->application->cv_path),
                        'mime' => 'application/pdf',
                    ]);
    }
}
