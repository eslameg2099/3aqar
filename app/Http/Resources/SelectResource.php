<?php

namespace App\Http\Resources;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Http\Resources\Json\JsonResource;

class SelectResource extends JsonResource
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
            'text' => $this->name,
            'image' => $this->getImage(),
        ];
    }

    /**
     * @return string
     */
    public function getImage()
    {
        if ($this->resource instanceof HasMedia) {
            return $this->getFirstMediaUrl();
        }
    }
}
