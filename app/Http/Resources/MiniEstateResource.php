<?php

namespace App\Http\Resources;

use App\Models\CustomField;
use App\Support\Date;
use App\Support\Price;
use App\Support\Youtube;
use App\Models\FieldValue;
use Illuminate\Http\Resources\Json\JsonResource;

class MiniEstateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id ,
            'name' => $this->name,
            'image' => $this->getFirstMediaUrl(),
            'created_at' => new Date($this->created_at),
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'blocked'=> $this->user->isblocked(auth('sanctum')->id(),$this->user->id),
        ];
    }

  
}

