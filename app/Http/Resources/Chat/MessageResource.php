<?php

namespace App\Http\Resources\Chat;

use App\Http\Resources\MiniUserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Support\Date;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sender' => new MiniUserResource($this->sender),
            'message' => $this->message,
            'image' => $this->getFirstMediaUrl() ?: null,
            'is_read' => $this->isRead(),
            'read_at' => $this->isRead() ? $this->readAt(): null,
            'created_at' => new Date($this->created_at),
        ];
    }

    protected function isRead()
    {
        $auth = $this->room->roomMembers->where('member_id', auth()->id())->first();

        if($auth) return $auth->last_read_message_id >= $this->id;
        return false;
    }

    protected function readAt()
    {
        return optional($this->getAuthMember()->read_at)->diffForHumans();
    }

    protected function getAuthMember()
    {
        return $this->room->roomMembers->where('member_id', auth()->id())->first();
    }
}
