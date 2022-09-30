<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class ContractorRequest extends FormRequest
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
       
        return RuleFactory::make([
            'name:ar' => ['required', 'string', 'max:255'],
            'name:en' => ['nullable','string', 'max:255'],
            'description:ar' => ['required', 'string', 'max:255'],
            'description:en' => ['nullable','string', 'max:255'],
            'city_id' => ['required', 'exists:cities,id'],
            'email' => ['nullable', 'email'],
            'phone' => ['required'],
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {

        return RuleFactory::make(trans('contractors.attributes'));
    }
}
