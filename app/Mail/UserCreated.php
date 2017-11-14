<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\PasswordReset;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $reset_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reset_token, User $user)
    {
        $this->user = $user;
        $this->reset_token = $reset_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.user.usercreatedmail');
        return $this ->from('noreply@charityq.com')
            ->subject('Welcome to CommunityQ!')
            ->markdown('emails.user.usercreatedmail');
    }
}
