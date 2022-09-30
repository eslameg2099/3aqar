<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'id' => $this->id,
            'estate_id' => $this->estate->id,
            'is_myestate' => $this->estate->ismyestate(auth('sanctum')->id(),$this->estate->id),
            'url' => $this->getFirstMediaUrl() ?: null,  
        ];  
    
    }
}
