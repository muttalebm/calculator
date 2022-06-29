<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class calculateApiRequest extends FormRequest
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
            //
            'equation' => 'required|array',
            'equation.*.type' => ['required', Rule::in('operand', 'operator')],
            'equation.*.value' => ['required']
        ];
    }


    /**
     * Get the error message for defined validation Rules
     * @return array
     */
    public function messages()
    {
        return [
            'equation.required' => "Equation cannot be empty",
            'equation.array' => "Must be valid equation object"
        ];

    }

    protected $redirect = false;


}
