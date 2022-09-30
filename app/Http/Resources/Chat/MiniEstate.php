<?php

namespace App\Http\Resources\Chat;

use App\Models\CustomField;
use App\Support\Date;
use App\Support\Price;
use App\Support\Youtube;
use App\Models\FieldValue;
use Illuminate\Http\Resources\Json\JsonResource;
class MiniEstate extends JsonResource
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
            'name' => $this->name,
           
           
        ];   
    
    }
}
