<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendChristmasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $answers;
    public $subject;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $answers, $subject, $event)
    {
        $this->name = $name;
        $this->email = $email;
        $this->answers = $answers;
        $this->subject = $subject;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->from($this->email)->markdown('mails.christmas-mail');
    }
}
