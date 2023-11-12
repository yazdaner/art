<?php

namespace Yazdan\Category\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yazdan\Category\App\Rules\CategorizableRule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|max:200',
            'slug' => 'nullable|max:200|unique:categories,slug',
            'parent_id' => 'required_without:type|nullable|exists:categories,id',
            'type' => ['required_without:parent_id','nullable', new CategorizableRule()],
        ];


        if (request()->method === 'PUT') {
            $rules['slug'] = "nullable|max:200|unique:categories,slug,".request()->route('category');
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            "slug" => "نام انگلیسی",
            "parent_id" => "دسته بندی پدر",
            "type" => "نوع دسته بندی",
        ];
    }
}
