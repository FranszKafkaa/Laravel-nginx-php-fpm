<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
            ],

            'description' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name é obrigatorio',
            'name.string' => 'Name deve ser uma string',

            'price.required' => 'Price é obrigatorio',
            'price.numeric' => 'Price deve ser numerico',

            'description.required' => 'description é obrigatorio',
            'description.string' => 'description deve ser uma string',

        ];
    }
}
