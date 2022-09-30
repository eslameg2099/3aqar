<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Lang;

class NestedSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'parents' => $this->parents,
            'parent_id' => $this->parent_id,
            'children' => [],
        ];

        foreach ($this->getModelWithParents() as $model) {
            if ($model->children->count()) {
                $data['children'][] = [
                    'id' => $model->id,
                    'data' => $model->children->map(function ($model) {
                        return [
                            'id' => $model->id,
                            'parent_id' => $model->parent_id,
                            'name' => $model->name,
                        ];
                    }),
                ];
            }
        }

        return $data;
    }
}
