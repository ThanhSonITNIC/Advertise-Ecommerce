<?php

namespace App\Mails\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entities\User;

class MailReset extends Mailable
{
    use Queueable, SerializesModels;
    private $token;
    private $email;
    private $route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email, $route)
    {
        $this->token = $token;
        $this->email = $email;
        $this->route = $route;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('layouts.mail.user.reset')->with(['email' => $this->email, 'token' => $this->token, 'route' => $this->route]);
    }
}
