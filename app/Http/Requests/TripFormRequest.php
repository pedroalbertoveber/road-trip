<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripFormRequest extends FormRequest
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
            'where_from'=>['required', 'min:3', 'max:255'],
            'where_to'=>['required', 'min:3', 'max:255'],
            'distance'=>['required', 'min:1', 'max:255'],
            'start_date'=>['date'],
            'end_date'=>['date'],
        ];
    }

    public function messages() 
    {
        return [
            'where_from.required' => '"Where From" is required to create a trip',
            'where_from.min' => '"Where From" must be at least :min characters',
            'where_from.max' => '"Where From" cannot be more than :max characters',
            'where_to.required' => '"Where To" is required to create a trip',
            'where_to.min' => '"Where To" must be at least :min characters',
            'where_to.max' => '"Where To" cannot be more than :max characters',
            'distance.required' => '"Distance" is required to create a trip',
            'distance.max' => '"Distance" cannot be more than :max characters',
            'start_date.date' => '"Start Date" must be as a date value',
            'end_date.date' => '"End Date" must be as a date value',
        ];
    }
}
