<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $newPassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password)
    {   
        $this->newPassword = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.forget_password');
    }
}
