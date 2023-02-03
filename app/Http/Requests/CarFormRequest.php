<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarFormRequest extends FormRequest
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
            'brand' => ['required'],
            'model' => ['required', 'min:2', 'max:255'],
            'fuel_economy' => ['required'],
            'model_year' => ['required', 'min:4', 'max:4'],
        ];
    }

    public function messages()
    {
        return [
            'brand.required' => "You must inform your car's brand!",
            'model.required' => "You must inform your car's model!",
            'model.min' => "Your car's model must be at least :min characters",
            'fuel_economy.required' => "You must inform your car's fuel economy!",
            'model_year.required' => "You must inform what is your car's model year!",
            'model_year.min' => "You must inform a valid year",
            'model_year.max' => "You must inform a valid year",
        ];
    }
}
