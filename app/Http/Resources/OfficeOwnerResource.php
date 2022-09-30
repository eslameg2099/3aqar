<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeOwnerResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
            'declared_id'=>  $this->declared_id,
            'is_myoffice' =>$this->ismyoffice(auth('sanctum')->id(),$this->id),
            'localed_type' => $this->present()->type,
            'office_logo'  =>optional($this->office)->getFirstMediaUrl("office_logo"),
            'office_name' => optional($this->office)->name,
            'office_id' => optional($this->office)->id,
            'office_description' => optional($this->office)->description,
            'office_cities' => $this->office ? CityResource::collection($this->office->cities): [],
            'phone_verified' => ! ! $this->phone_verified_at,
            'is_certified' => (boolean)  optional($this->office)->certified_at ,
            'is_classified' => (boolean)  optional($this->office)->classified_at,
            'is_active' => (boolean)  optional($this->office)->active_at,
            'avatar' => $this->getAvatar(),
            'cities' => CityResource::collection($this->cities),
            'created_at' => $this->created_at->toDateTimeString(),
            'created_at_formatted' => $this->created_at->diffForHumans(),
        ];
    }
}
