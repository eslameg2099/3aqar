<?php

namespace App\Http\Resources;
use App\Support\Date;

use Illuminate\Http\Resources\Json\JsonResource;

class RequsetSponsorResource extends JsonResource
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
            'banner' => ! !  $this->getMedia('RequsetSponsors')->first() ,
            'estate' => new MiniEstateResource($this->estate),
            'status' => $this->check($this->id),
            'type' => $this->type,
            'created_at' => new Date($this->created_at),
            'finshed_at'=>new Date($this->sponser_at),
           

        ];  
  }
}
