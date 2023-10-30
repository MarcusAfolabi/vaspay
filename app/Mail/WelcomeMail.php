<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope; 

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
 
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

   
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.welcome-mail',
        );
    }
 
}
