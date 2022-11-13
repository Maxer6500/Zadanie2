<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarValidation extends FormRequest
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
            'name' => 'required|max:100',
            'model' => 'required|max:150',
            'description' => 'required|max:1000',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:99999999',

        ];
    }
}
