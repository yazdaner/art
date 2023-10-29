<?php

namespace Yazdan\Category\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'parent_id' => 'nullable|exists:categories,id',
        ];


        if (request()->method === 'PATCH') {
            $rules['slug'] = "nullable|max:200|unique:categories,slug,".$this->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            "slug" => "نام انگلیسی",
            "parent_id" => "دسته بندی پدر",
        ];
    }
}
