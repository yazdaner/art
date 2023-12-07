<?php

namespace Yazdan\CustomerOrder\App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Yazdan\CustomerOrder\Repositories\CustomerOrderRepository;

class CustomerOrderRequest extends FormRequest
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
        $rules =  [
            "name" => "required",
            "description" => "required",
            "phone" => "required|iran_mobile",
            "media" => "required|image",
            "size" => ["required", Rule::in(CustomerOrderRepository::$sizes)],
            "canvas" => ["required", Rule::in(CustomerOrderRepository::$canvas_types)],
            "shape" => ["required", Rule::in(CustomerOrderRepository::$shapes)],
            "invoicing" => ["required","array"],
            "invoicing.*" => ["required", Rule::in(CustomerOrderRepository::$invoicing)],
        ];

        // if (request()->method === 'PATCH') {
        //     $rules['media'] = "nullable|image";
        // }
        // return $rules;
        return $rules;
    }


    public function attributes()
    {
        return [
            "canvas" => "نوع بوم",
            "shape" => "شکل",
            "preview" => "متن پیش نمایش",
            "content" => "محتوا",
            "invoicing" => "صدور فاکتور از طریقه",
        ];
    }
}
