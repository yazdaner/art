<?php

namespace Yazdan\Product\App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Product\Repositories\ProductRepository;

class GalleryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'images' => 'required',
            'images.*' => ['required','mimes:jpg,png,jpeg','max:2048'],
        ];
    }
}
