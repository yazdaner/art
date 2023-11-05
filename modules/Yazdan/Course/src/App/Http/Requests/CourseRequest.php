<?php
namespace Yazdan\Course\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Yazdan\Course\Repositories\CourseRepository;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        $rules = [
            "title" => 'required|min:3|max:190',
            "slug" => 'nullable|min:3|max:190|unique:courses,slug',
            "priority" => 'nullable|numeric',
            "time" => 'nullable|numeric',
            "spot_course_token" => 'required|string',
            "price" => 'required|numeric|min:0|max:10000000',
            "price2" => 'nullable|numeric|min:0|max:10000000',
            "status" => ["required", Rule::in(CourseRepository::$statuses)],
            "media" => "required|mimes:jpg,png,jpeg",
        ];

        if (request()->method === 'PUT') {
            $rules['media'] = "nullable|mimes:jpg,png,jpeg";
            $rules['slug'] = 'required|min:3|max:190|unique:courses,slug,' . request()->route('course');
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            "title" => "عنوان",
            "slug" => "عنوان انگلیسی",
            "price" => "قیمت",
            "price2" => "قیمت ویژه",
            "priority" => "الویت دوره",
            "status" => "وضعیت",
            "type" => "نوع",
            "media" => "بنر دوره",
            "time" => "مدت دوره",
            "spot_course_token" => "شناسه اسپات دوره",
        ];
    }


}
