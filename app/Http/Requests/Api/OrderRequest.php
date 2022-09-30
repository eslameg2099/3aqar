<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
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
            'space_from' => [ 'numeric','min:1'],
            'space_to' => [ 'numeric','min:1'],
            'price_from' => [ 'numeric','min:1'],
            'price_to' => [ 'numeric','min:1'],
            'type_id' => ['required', Rule::exists('types', 'id')->whereNull('deleted_at')],
            'city_id' => ['required',  Rule::exists('cities', 'id')->whereNull('deleted_at')
        ],


        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('orders.attributes');
    }
}
