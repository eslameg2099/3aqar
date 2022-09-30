<?php

namespace App\Http\Requests\Api;
use App\Models\Estate;

use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
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
            'like' => ['required', 'numeric','between:0,1'],
            'estate_id' => ['required', 'numeric','exists:estates,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */

    public function attributes()
    {
        return trans('like.attributes');
    }
   
}
