<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\Concerns\HasPrefix;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\WithHashedPassword;

class OfficeOwnerRequest extends FormRequest
{
    use WithHashedPassword;
    use HasPrefix;

    /**
     * Determine if the supervisor is authorized to make this request.
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

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required', 'min:8', 'confirmed'],
            'type' => ['sometimes', 'nullable', Rule::in(array_keys(trans('users.types')))],
            'city_id' => ['required', 'exists:cities,id'],
            'office_name' => ['required', 'string', 'max:255'],
            'office_description' => ['required'],
            'office_city_id' => ['required', 'exists:cities,id'],
        ];
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,'.$this->route('office_owner')->id],
            'phone' => ['required', 'unique:users,phone,'.$this->route('office_owner')->id],
            'password' => ['nullable', 'min:8', 'confirmed'],
            'type' => ['sometimes', 'nullable', Rule::in(array_keys(trans('users.types')))],
            'city_id' => ['required', 'exists:cities,id'],
            'office_name' => ['required', 'string', 'max:255'],
            'office_description' => ['required'],
            'office_city_id' => ['required', 'exists:cities,id'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('office_owners.attributes');
    }
}
