<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasanakuInfo extends Mailable
{
    use Queueable, SerializesModels;

    public $pasanaku;
    public $admin;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin,$pasanaku)
    {
        $this->pasanaku = $pasanaku;
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pasanaku_info');
    }
}
