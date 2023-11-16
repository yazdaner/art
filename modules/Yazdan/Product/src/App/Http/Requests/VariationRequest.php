<?php

namespace Yazdan\Product\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $rules = [
            'title' => ['required'],
            'quantity' => ['required','integer'],
            'price' => ['required','integer'],
            'price2' => ['nullable','integer'],
            'sku' => ['nullable'],
        ];

        if (request()->method === 'POST') {
            $rules['product_id'] = ['required','exists:products,id'];
        }
        return $rules;
    }
}
