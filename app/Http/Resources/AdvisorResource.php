<?php

namespace App\Http\Resources;
use App\Support\Price;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvisorResource extends JsonResource
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
            'price' => new Price($this->price),

        ];
        }
}
