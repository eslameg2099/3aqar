<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculatorRequest extends FormRequest
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
            'type' => ['required', 'string', 'max:255', Rule::in([
                "building",
                "purchasing",
                
            ]),],
            'space' => ['required', 'numeric','between:0,9999999999'],

            //
        ];
    }

    public function attributes()
    {
        return trans('cal.attributes');
    }
}
