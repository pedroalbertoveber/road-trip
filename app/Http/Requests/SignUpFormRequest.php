<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpFormRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name is required do sign up',
            'name.min' => 'Your name must be at least :min characters',
            'name.max' => 'Your name cannot be more than :max characters',
            'email.required' => 'E-mail is required to sign up',
            'email.email' => 'E-mail must be formated as an emaill address',
            'email.max' => 'E-mail cannot be more than :max characters',
            'password.required' => 'Password is required to sign up',
            'password.min' => 'Password must be at least :min characters',
            'password.confirmed' => "Confirmed password doesn't match",
            'password.max' => 'Password cannot be more than :max characters',
        ];
    }
}
