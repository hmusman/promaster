<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class shareCertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $usersubject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $usersubject)
    {
        $this->details = $details;
        $this->usersubject = $usersubject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->usersubject)->view('user.pages.certificateEmail-template');
    }
}
