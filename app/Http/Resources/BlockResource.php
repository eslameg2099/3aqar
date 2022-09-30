<?php

namespace App\Http\Resources;
use App\Support\Date;

use Illuminate\Http\Resources\Json\JsonResource;

class BlockResource extends JsonResource
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
            'id'=> $this->id,
            'type' => $this->type,
            'block_member' => $this->user->getResource(),
            'created_at' => new Date($this->created_at),
        ];
    }

}
