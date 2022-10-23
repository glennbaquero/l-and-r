<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'mobile_number' => ['required', 'unique:web_users'],
            'email' => ['required', 'email', 'unique:web_users'],
            'password' => ['required', 'min:8', 'regex:/^[A-Za-z0-9]+$/', 'confirmed'],
        ];

    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'mobile.required' => 'Mobile number is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'password.min' => 'Password must be at least 8 characters long',
            'password.regex' => 'Only letters and numbers are allowed',
        ];
    }
}
