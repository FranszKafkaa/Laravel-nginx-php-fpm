<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleRequest extends FormRequest
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
            'products' => [
                'required',
                'array',
            ],
            'products.*' => [
                'array',
            ],
            'products.*.id' => [
                'numeric',
                Rule::exists('products', 'id'),
            ],
            'products.*.amount' => [
                'numeric',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'products.required' => 'products é obrigatório',
            'products.array' => 'products deve ser um array',

            'products.*.array' => 'os valores products deve ser um array',
            'products.*.required' => 'os products não podem ser vazios',

            'products.*.id.required' => 'id é obrigatório',
            'products.*.id.numeric' => 'id deve ser numérico',
            'products.*.id.exists' => 'o id não existe na base de dados',

            'products.*.amount.required' => 'amount é obrigatório',
            'products.*.amount.numeric' => 'amount deve ser numérico',
        ];
    }
}
