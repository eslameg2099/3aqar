<?php

namespace App\Support\Chat\Events;

use App\Models\ChatRoom;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class RoomAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\ChatRoom
     */
    public $room;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\ChatRoom $room
     */
    public function __construct(ChatRoom $room)
    {
        $this->room = $room;
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
