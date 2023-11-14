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
        $rules = [
            'category_id' => ['required','exists:categories,id'],
            "media" => ['required','mimes:jpg,png,jpeg','max:2048'],
            'title' => ['required','string','max:255','unique:blogs,title'],
            'body' => ['required'],
            "status" => ["required", Rule::in(ProductRepository::$statuses)],
            'body' => ['required'],
            'delivery_amount' => ['nullable','integer'],
            'delivery_amount_per_product' => ['nullable','integer'],
        ];

        if (request()->method === 'POST') {
            $rules['images'] = ['required'];
            $rules['images.*'] = ['required','mimes:jpg,png,jpeg','max:2048'];
        }

        if (request()->method === 'PUT') {
            $rules['media'] = 'nullable|mimes:png,jpg|max:2048';
            $rules['title'] = 'required|min:3|unique:blogs,title,'.request()->route('blog');
        }
        return $rules;
    }
}
