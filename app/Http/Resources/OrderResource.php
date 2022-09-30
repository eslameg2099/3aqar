<?php

namespace App\Http\Resources;

use App\Support\Date;
use App\Support\Price;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => $this->user->getResource(),
            'estate_type' => new TypeResource($this->estateType),
            'type' => (int) $this->type,
            'readable_type' => trans('types.types.'.$this->type),
            'is_locked' => $this->locked(),
            'cities' => CityResource::collection($this->cities),
            'space_from' => (float) $this->space_from,
            'space_to' => (float) $this->space_to,
            'price_from' => new Price($this->price_from),
            'price_to' => new Price($this->price_to),
            'created_at' => new Date($this->created_at),
            'published_at' => new Date($this->published_at),
        ];
    }
}
