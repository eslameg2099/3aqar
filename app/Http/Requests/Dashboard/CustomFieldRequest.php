<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class CustomFieldRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }


    public function createRules()
    {
      

        return RuleFactory::make([
            '%name%' => ['required', 'string', 'max:255', 'unique:custom_field_translations,name'],
         

        ]);
        
    }

    public function updateRules()
    {
        return RuleFactory::make([

            '%name%' => ['required', 'string', 'max:255'],
            
        ]);

    }


    public function attributes()
    {

        return RuleFactory::make(trans('customfield.attributes'));
    }
}
