<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundCloseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $amount;
    public $id;

    public function __construct($name, $amount, $id)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Refund Closed: ".$this->id)->from(env("MAIL_USERNAME"),env("MAIL_FROM_NAME"))->markdown('mails.refund-close-mail');
    }
}