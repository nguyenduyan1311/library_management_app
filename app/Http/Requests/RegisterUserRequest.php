<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:users,name'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
            'phone' => ['required', 'digits:10', 'unique:users'],
            'address' => ['required'],
            'terms' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'name.unique' => 'The name has already been taken',
            'email.required' => 'The email field is required',
            'email.email' => 'The email must be a valid email address',
            'email.unique' => 'The email has already been taken',
            'password_confirmation.required' => 'The password field is required',
            'password_confirmation.min' => 'The password must be at least 6 characters',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 6 characters',
            'password.confirmed' => '',
            'phone.required' => 'The phone filed is required',
            'phone.digits' => 'The phone must be a valid phone number',
            'phone.unique' => 'The phone number has already been taken',
            'terms.required' => ''
        ];
    }
}
