<?php

namespace App\Http\Requests\Api;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class ArchetictureRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'space' => ['required', 'string'],
            'type_id' =>['required', Rule::exists('types', 'id')->whereNull('deleted_at')],

            //
        ];
    }

    public function attributes()
    {
        return trans('estates.attributes');
    }
}
