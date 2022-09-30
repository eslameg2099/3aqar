<?php

namespace App\Http\Resources\Chat;
use App\Http\Resources\EstateResource;
use App\Http\Resources\Chat\MiniEstate;
use App\Http\Resources\MiniUserResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\TitileOrderResource;


use App\Http\Resources\miniOrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\ChatRoom */
class RoomResource extends JsonResource
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
            'titele_estate' => new MiniEstate($this->estate) ?: null ,
            'titele_order' =>  new TitileOrderResource($this->order) ?: null,
            'type_chat'=> $this->type_chat,
            'date' => $this->created_at->diffForHumans(),
            //'image' =>   $this->getImage(),
            'last_message' => new MessageResource($this->whenLoaded('lastMessage')),
            'member' => new MiniUserResource($this->getOtherMember()),
            //'type' => (int) $this->type,
        ];
    }

    protected function getName()
    {
        return $this->getOtherMembers()->implode('member.full_name', ',');
    }

    protected function getImage()
    {
        if ($this->getOtherMembers()->count() > 1) {
            return 'group image';
        }

        if ($member = $this->getOtherMembers()->first()) {
            return optional($member)->member->getAvatar() ?: null;
        }
        //return ;
    }

    public function canSendMessage()
    {

        return true;
    }
}
