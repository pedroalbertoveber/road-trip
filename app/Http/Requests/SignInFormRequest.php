<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInFormRequest extends FormRequest
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
            'email' => ['required'],
            'password' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {   
        return [
            'email.required' => '"E-mail" is required to Sign-In',
            'password.required' => '"Password" is required to Sign-In',
            'password.min' => '"Password" must have at least :min characters',
        ];
    }
}
