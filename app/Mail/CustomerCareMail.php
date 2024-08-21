<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CustomerCare;

class CustomerCareMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerCare;

    public function __construct(CustomerCare $customerCare)
    {
        $this->customerCare = $customerCare;
    }

    public function build()
    {
        return $this->view('emails.customercare')
                    ->with([
                        'issue' => $this->customerCare->issue,
                        'name' => $this->customerCare->name,
                        'email' => $this->customerCare->email,
                        'phone' => $this->customerCare->phone,
                        'message' => $this->customerCare->message,
                    ]);
    }
}
