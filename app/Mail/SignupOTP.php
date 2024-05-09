<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignupOTP extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    /**
     * Create a new message instance.
     *
     * @param  string  $otp
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pembopayapp@gmail.com', 'Barangay Sta Cruz')
        ->subject('Welcome to Barangay Santa Cruz Online')
        ->view('signinup.otp')
        ->with([
            'otp' => $this->otp,
        ]);
    }
}
