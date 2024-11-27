<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Your email address is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'first_name.required' => 'Your first name is required.',
            'first_name.alpha' => 'The first name may only contain letters. No spaces, numbers or special characters allowed',
            'last_name.required' => 'Your last name is required.',
            'last_name.alpha' => 'The first name may only contain letters. No spaces, numbers or special characters allowed',
            'phone.required' => 'Your phone number is required.',
            'phone.numeric' => 'The phone field must be in numeric value. No country codes allowed',
            'password.required' => 'Please input a strong password.',
            'password.min' => 'The password must be at least 8 characters.',
            'password_confirmation.required' => 'Please retype your password once more.',
            'password_confirmation.same' => 'The password confirmation does not match the password.'
        ];
    }
}
