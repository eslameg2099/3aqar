<?php

namespace App\Support\Chat\Events;

use App\Models\ChatRoomMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class MessageRead
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\ChatRoomMessage
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\ChatRoomMessage $message
     */
    public function __construct(ChatRoomMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
