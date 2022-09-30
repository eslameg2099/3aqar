<?php

namespace App\Http\Requests\Api;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class RequsetSponsorRequest extends FormRequest
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
            'estate_id' => ['required', 'numeric','exists:estates,id'],
            'image' => ['nullable'],
            'type' => ['required', 'string', Rule::in([
                "banner",
                "default",
                
            ]),],


            //
        ];
    }

    public function attributes()
    {
        return trans('estates.attributes');
    }
}
