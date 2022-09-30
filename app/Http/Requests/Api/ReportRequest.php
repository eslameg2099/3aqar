<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
            'message' => ['required', 'string', 'max:255'],
            'item_id' => ['required', 'numeric'],
            'type'=>
            [
                'required',
                Rule::in([
                    'estate','engineeringoffice','contractor','expert','estateoffice'
                ]),
            ],
        ];  
    }


    public function attributes()
    {
        return trans('report.attributes');
    }
}
