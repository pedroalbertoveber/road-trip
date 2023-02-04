<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelFormRequest extends FormRequest
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
            'price' => ['required', 'lt:1000', 'gt:40'],
        ];
    }

    public function messages() {
        return [
            'name.required' => "Hotel's name is required",
            'name.min' => "Hotel's name must be at least :min characters",
            'price.required' => "Hotel's price per nights is required",
            'price.gt' => "Hotel's price must be more expansive than R$ 40,00",
            'price.lt' => "Hotel's price must be cheaper than $ 1.000,00",
        ];
    }
}
