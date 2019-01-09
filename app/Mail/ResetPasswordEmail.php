<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->user = [
            'user_id' => $data['user_id'],
            'username' => $data['username'],
            'email' => $data['email'],
            'name' => $data['name'],
            'token' => $data['token'],
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetPassword')
            ->subject(config('app.email_subject.resetPassword'))
            ->with(['user' => $this->user]);
    }
}
