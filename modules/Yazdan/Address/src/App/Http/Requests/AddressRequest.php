<?php

namespace Yazdan\Address\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        return [
            'name' => 'required',
            'phone' => 'required|iran_mobile',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'postal_code' => 'required|iran_postal_code'
        ];
    }

    public function attributes()
    {
        return [
            "name" => "نام و نام خانوادگی",
            "phone" => "شماره تماس",
            "address" => "آدرس",
            "postal_code" => "کد پستی",
            "city_id" => "شهر",
            "province_id" => "استان",
        ];
    }
}
