<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\{WebPushChannel, WebPushMessage};

class PushDemo extends Notification
{
    use Queueable;

    public function __construct(
        public $id, // @phpstan-ignore-line
        public string $body,
        public string $ref,
    ) {
    }

    public function via($notifiable)
    {
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage())
            ->title($this->body)
            ->icon('/notification-icon.png')
            ->body($this->ref)
            ->data([
                'notiURL' => route('home.pray', ['id' => $this->id]),
            ])
            ->action('Ver Oração', 'notification_action');
    }
}
