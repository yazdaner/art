<?php

namespace Yazdan\Product\App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Product\Repositories\ProductRepository;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required','exists:categories,id'],
            "media" => ['required','mimes:jpg,png,jpeg'],
            'title' => ['required','string','max:255','unique:blogs,title'],
            'body' => ['required'],
            "status" => ["required", Rule::in(ProductRepository::$statuses)],
            'body' => ['required'],
            'delivery_amount' => ['nullable','integer'],
            'delivery_amount_per_product' => ['nullable','integer'],
            'images' => ['required'],
            'images.*' => ['required','mimes:jpg,png,jpeg'],
        ];
    }

}
