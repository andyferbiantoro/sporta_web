<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cekemail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cekemail)
    {
        //
        $this->cekemail = $cekemail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kode Berharil dikirim')
        ->markdown('emails.forgot_shipped');
    }
}
