<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountBankResource extends JsonResource
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
            'image' => $this->getFirstMediaUrl() ?: null,
            'titele' => $this->titele,
            'description' => $this->description,
            'name_account' => $this->name_account,
            'num_account' => $this->num_account,
            'num_iban' => $this->num_iban,

        ];  
      }
}
