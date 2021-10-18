<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $riwayat;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($riwayat)
    {
        //construct menginisialisasi nilai default dari model sendMail
        $this->riwayat = $riwayat;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email dari UD Wangi Agung')->view('mail.nota');
    }
}
