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

    public $email;
    public $token;

    public function __construct($email, $token)
    {
        $this->email = $email;
        $this->token = $token;
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Your Account Password',
        );
    }

    
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'mail.password-reset-mail',
    //     );
    // }

    public function build()
    {
        return $this
            ->subject('Password Reset Request')
            ->view('mail.password-reset-mail')
            ->with(['token' => $this->token, 'email' => $this->email]);
    }
    
    public function attachments(): array
    {
        return [];
    }
}
