<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;

    /**
     * Buat instance baru dan data user yang akan dikirimkan
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Registrasi Berhasil - Aplikasi Buku')
                    ->view('emails.user_registered');
    }
}
