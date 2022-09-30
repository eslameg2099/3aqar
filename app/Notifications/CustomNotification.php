<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $data = [];

    /**
     * Create a new notification instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->data['via'] ?? [];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toPusher($notifiable)
    {
        $data = $this->data['fcm'] ?? [];

        return array_merge($data, [
            'notification_id' => $this->id,
        ]);
    }

    /**
     * The pusher interests for the notification.
     *
     * @param $notifiable
     * @return string[]
     */
    public function pusherInterests($notifiable)
    {
        return $this->data['interests'] ?? [(string)$notifiable->id];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $data = $this->data['database'] ?? [];

        return array_merge($data, [
            'notification_id' => $this->id,
        ]);
    }
}
