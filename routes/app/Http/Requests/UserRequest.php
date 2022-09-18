<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => 'string|unique:users',
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'email|unique:users',
            'age' => 'integer',
            'gender' => 'integer|nullable',
            'phone' => 'unique:users',
            'password' => 'string|confirmed',
            'password_confirmation' => ''
        ];
    }
}
