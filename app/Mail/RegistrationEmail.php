<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationEmail extends Mailable implements ShouldQueue
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
            'code' => $data['code'],
//            'data' => $data['data'],
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registrationEmail')
            ->subject(config('app.email_subject.registration'))
            ->with(['user' => $this->user]);
    }
}
