<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    const PRIVATE_ROOM = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estate_id',
        'order_id',
        'type',
        'sender_id',
        'receiver_id',
        'type_chat',
    ];

    protected $with = [
        'lastMessage',
        'roomMembers.member',
    ];

    /**
     * Get all the members of the chat room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomMembers()
    {
        return $this->hasMany(ChatRoomMembers::class, 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lastMessage()
    {
        return $this->hasOne(ChatRoomMessage::class, 'room_id')->latest('id');
    }

    /**
     * Get all the messages of the chat room.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(ChatRoomMessage::class, 'room_id');
    }

    public function getOtherMembers()
    {
        return $this->roomMembers->where('member_id', '!=', auth()->id());
    }
    /**
     * A message belong to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estate()
    {
        return $this->belongsTo(Estate::class,'estate_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function getOtherMember()
    {
        $roomMember = $this->roomMembers()->where('member_id', '!=', auth()->id())->whereHas('member', function ($query) {
            $query->where('type', '!=', User::ADMIN_TYPE);
        })->first();

        if ($roomMember) {
            return $roomMember->member;
        }
    }
}
