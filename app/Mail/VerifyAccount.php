<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyAccount extends Mailable
{
    use Queueable, SerializesModels;

    public $account;
    public $verificationUrl;

    public function __construct($acc, $url)
    {
        $this->account = $acc;
        $this->verificationUrl = $url;
    }

    public function build()
    {
        return $this->subject('Verify your account')
                    ->view('mail.verifyaccount')
                    ->with([
                        'account' => $this->account,
                        'verificationUrl' => $this->verificationUrl,
                    ]);
    }
}

