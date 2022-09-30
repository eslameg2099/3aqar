<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Support\Date;

class MiniOrderResource extends JsonResource
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
            'id'=> $this->id ,
            'name' => $this->description,
            'created_at' => new Date($this->created_at),
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'blocked'=> $this->user->isblocked(auth('sanctum')->id(),$this->user->id),    
        ]; 
    
    }
}
