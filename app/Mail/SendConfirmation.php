<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userId, $code)
    {
        $this->link = route('confirm_user', ['id' => $userId, 'code' => $code]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send_confirmation');
    }
}
