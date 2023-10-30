<?php

namespace App\Events;

use App\Mail\CustomPasswordReset;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PasswordReset
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    public function toMail($notifiable)
    {
        return (new CustomPasswordReset($this->token))
            ->to($notifiable->getEmailForPasswordReset());
    }
}
