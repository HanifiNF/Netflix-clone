<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailMessage;
    public $userName;
    public $userEmail;

    /**
     * Create a new message instance.
     *
     * @param  string  $message
     * @param  string  $name
     * @param  string  $email
     */
    public function __construct($message, $name, $email)
    {
        $this->emailMessage = $message;
        $this->userName = $name;
        $this->userEmail = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Customer Message')
            ->view('Email.contact')
            ->with([
                'emailMessage' => $this->emailMessage,
                'userName' => $this->userName,
                'userEmail' => $this->userEmail,
            ]);
    }
}
