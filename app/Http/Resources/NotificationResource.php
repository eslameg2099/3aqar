<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Notification;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'pusher_id' => $this->id,
            'title' => $this->getTitle(),
            'body' => $this->getBody(),
            'image' => $this->getImage(),
            'type' => $this->data['type'],
            'data' => $this->getData(),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }

    protected function getData()
    {
        switch ($this->data['type']) {
            case Notification::active:
                return [
                    'id' => $this->user_id,
                ];
            case Notification::CHAT:
                return [
                    'id' => $this->room_id,
                ];
        }
    }

    public function getTitle()
    {
        return config('app.name');
    }
    public function getBody()
    {
        return trans($this->data['trans'], [
            'user' => optional($this->user)->name,
            'active' => '#'. optional($this->user)->id,
            'room' => '#'. optional($this->room)->id,
        ]);
    }
    public function getImage()
    {
        return 'https://via.placeholder.com/150';
    }
}
