<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msg;
    public $sub;

    public function __construct($subject, $message)
    {
        //
        $this->sub = $subject;
        $this->msg = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_message = $this->sub;
        $e_sub = $this->sub;
        return $this->view('email.admin_mail', compact('e_message'))->subject($e_sub);
    }
}
