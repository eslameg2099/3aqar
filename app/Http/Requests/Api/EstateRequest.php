<?php

namespace App\Http\Requests\Api;

use App\Models\Type;
use App\Models\Estate;
use App\Rules\YoutubeUrl;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'user_type' => [
                'required',
                Rule::in([
                    Estate::OWNER_USER_TYPE,
                    Estate::MARKETER_USER_TYPE,
                    Estate::AGENT_USER_TYPE,
                ]),
            ],
            'type' => ['required', Rule::in([Type::RENT_TYPE, Type::SELLING_TYPE])],
            'type_id' => ['required', Rule::exists('types', 'id')->whereNull('deleted_at')],
            'city_id' => [
                'required',
                Rule::exists('cities', 'id')->where(function (Builder $query) {
                    return $query
                        ->whereNull('cities.deleted_at')
                        ->whereNotExists(function (Builder $builder) {
                            $builder->from('cities', 'children')
                                ->whereColumn('cities.id', 'children.parent_id')
                                ->whereNull('children.deleted_at');
                        });
                }),
            ],
            'space' => ['required', 'numeric','between:1,9999999'],
            'price' => ['required', 'numeric','between:1,99999999999'],
            'video' => ['nullable', new YoutubeUrl],
            'agent_id'=> ['nullable','numeric'],
            'marketer_id' => ['nullable','numeric'],
            'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'images' => ['nullable'],
            
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('estates.attributes');
    }
}
