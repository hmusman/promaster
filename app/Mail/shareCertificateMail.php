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
    public $title;
    public $usersubject;
    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $usersubject, $data=[], $title)
    {
        $this->details = $details;
        $this->usersubject = $usersubject;
        $this->data = $data;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->usersubject)->view('user.pages.certificateEmail-template')
                    ->attach($this->data['document'],
                            [
                                'as' => $this->title . '.png',
                                // 'mime' => $this->data['document'],
                            ]);
    }
}
