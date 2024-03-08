<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
                'string',
            ],
            'price' => [
                'numeric',
                'min:1',
            ],

            'description' => [
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Name deve ser uma string',
            'price.min' => 'o valor do preço não pode ser menor que :min',
            'price.numeric' => 'Price deve ser numerico',
            'description.string' => 'description deve ser uma string',
        ];
    }
}
