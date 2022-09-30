<?php

namespace App\Http\Resources;

use App\Models\CustomField;
use App\Support\Date;
use App\Support\Price;
use App\Support\Youtube;
use App\Models\FieldValue;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
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
            'likes'=>$this->Like()->where('like','1')->count(),
            'dislikes'=>$this->Like()->where('like','0')->count(),
            'is_like' => $this->islike(auth('sanctum')->id(),$this->id),
            'isdislike' => $this->isdislike(auth('sanctum')->id(),$this->id),
            'is_special'=>  $this->isSpecial($this->id),
            'name' => $this->name,
            'description' => $this->description,
            'images' => MediaResource::collection($this->getMedia()),
            'type' => (int) $this->type,
            'readable_type' => trans('types.types.'.$this->type),
            'estate_type' => new TypeResource($this->estateType),
            'user_type' => (int) $this->user_type,
            'readable_user_type' => trans('estates.user_types.'.$this->user_type),
            'user' => $this->user->getResource(),
            'cities' => CityResource::collection($this->cities),
            'space' => (float) $this->space,
            'price' => new Price($this->price),
            'video' => new Youtube($this->video),
            'is_locked' => $this->locked(),
            'is_favorite' => $this->isFavorited(auth('sanctum')->id()),
            'is_myestate'=> $this->ismyestate(auth('sanctum')->id(),$this->id),
            'is_sold' => $this->sold(),
            'agent_id' =>  $this->agent_id,
            'marketer_id' => $this->marketer_id,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'distance' => $this->distance ? round($this->distance, 2).' '.trans('estates.km') : null,
            'fields' => $this->fieldValues->map(function (FieldValue $value) {
                return [
                    'key' => $value->field->name,
                    'value' => $this->getFieldValue($value),
                    'check' => $value->type == CustomField::SWITCH_TYPE ? (bool) $value->value : null,
                ];
            }),
            'created_at' => new Date($this->created_at),
            'published_at' => new Date($this->published_at) ,

        ];
    }

    public function getFieldValue($value)
    {
        if ($value->type == CustomField::SWITCH_TYPE) {
            return null;
        }

        if($value->type == "buttons")
        {
            return (string) (optional($value->option)->name);
        }
        else
        return (string) ($value->value);
    }
}
