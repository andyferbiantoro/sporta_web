<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KonfirmasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $confirm;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($confirm)
    {
         $this->confirm = $confirm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pembayaran Anda Sudah Terverifikasi')
        ->markdown('emails.shipped');
    }
}
