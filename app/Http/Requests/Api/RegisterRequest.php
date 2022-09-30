<?php

namespace App\Http\Requests\Api;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\Concerns\HasPrefix;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Concerns\WithHashedPassword;

class RegisterRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'declared_id' => ['numeric', 'unique:users,declared_id'],
            'phone' => ['required', 'unique:users,phone'],
            'password' => ['required', 'min:8', 'confirmed'],
            'city_id' => ['required', 'exists:cities,id'],
            'avatar' => ['nullable', 'image'],
            'office_name' => [
                Rule::requiredIf(function () {
                    return $this->type == User::OFFICE_OWNER_TYPE;
                }),
            ],
            'office_description' => [
                Rule::requiredIf(function () {
                    return $this->type == User::OFFICE_OWNER_TYPE;
                }),
            ],
            'office_city_id' => [
                Rule::requiredIf(function () {
                    return $this->type == User::OFFICE_OWNER_TYPE;
                }),
            ],
            'type' => [
                'nullable',
                Rule::in([
                    User::CUSTOMER_TYPE,
                    User::OFFICE_OWNER_TYPE,
                ]),
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
        return trans('customers.attributes');
    }
}
