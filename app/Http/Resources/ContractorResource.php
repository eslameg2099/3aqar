<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->getFirstMediaUrl() ?: null,
            'cities' => CityResource::collection($this->cities),
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}
