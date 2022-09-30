<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Support\Date;
use App\Support\Price;
use App\Support\Youtube;
class ArchetictureResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
           'type' =>  new TypeResource($this->Type),
           'category' => new CategoryArchetictureResource ($this->category) ,
            'video' => new Youtube($this->video),
             'image' => $this->getFirstMediaUrl() ?: null,
            'images' => MediaResource::collection($this->getMedia()),

            'created_at' => new Date($this->created_at),
        ];  
    
    }
}
