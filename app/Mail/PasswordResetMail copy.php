<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }
   
 
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Your Account Password',
        );
    }

    
    public function content(): Content
    {
        return new Content(
            view: 'mail.custom-password-reset',
        ); 
    }

    
    public function attachments(): array
    {
        return [];
    }
}
