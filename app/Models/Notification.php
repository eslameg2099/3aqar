<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

/**
 * @property-read \App\User $user
 * @property-read \App\Model\League $league
 * @property-read \App\Model\Match $match
 * @property-read \App\Model\ChatRoom $room
 */
class Notification extends DatabaseNotification
{
       /**
     * @var int
     */
    const LEAGUE = 4;

    /**
     * @var int
     */
    const neworder = 3;

    /**
     * @var int
     */
    const active = 2;

    /**
     * @var int
     */
    const CHAT = 1;

    /**
     * Get the user that associated the notification.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(User::class, 'order_id');
    }

    

    /**
     * Get the league that associated the notification.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    /**
     * Get the chat room that associated the notification.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'room_id');
    }
}
