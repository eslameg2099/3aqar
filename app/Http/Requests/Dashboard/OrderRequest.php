<?php

namespace App\Http\Requests\Dashboard;

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
            'space_from' => ['required', 'numeric'],
            'space_to' => ['required', 'numeric'],
            'price_from' => ['required', 'numeric'],
            'price_to' => ['required', 'numeric'],
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
