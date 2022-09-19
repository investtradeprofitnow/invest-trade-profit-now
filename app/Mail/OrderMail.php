<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $orderId;
    public $date;
    public $strategyNames;
    public $amount;
    public $coupon;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $orderId, $date, $strategyNames, $amount, $coupon)
    {
        $this->name = $name;
        $this->orderId = $orderId;
        $this->date = $date;
        $this->strategyNames = $strategyNames;
        $this->amount = $amount;
        $this->coupon = $coupon;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Order Details: ".$this->orderId)->from(env("MAIL_USERNAME"),env("MAIL_FROM_NAME"))->markdown("mails.order-mail");
    }
}
