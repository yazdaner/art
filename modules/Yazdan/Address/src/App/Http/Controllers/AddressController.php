<?php

namespace Yazdan\Address\App\Http\Controllers;

use Illuminate\Http\Request;
use Yazdan\Address\App\Models\City;
use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Address\App\Models\Province;
use Yazdan\Address\App\Http\Requests\AddressRequest;
use Yazdan\Address\Repositories\AddressRepository;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::where('user_id', auth()->id())->first();
        $provinces = Province::all();
        return view("Address::front.index",compact('address','provinces'));
    }

    public function store(AddressRequest $request)
    {
        AddressRepository::store($request);
        newFeedbacks('با موفقیت', 'آدرس مورد نظر ایجاد شد','success');
        return back();
    }

    public function getProvinceCitiesList(Request $request)
    {
         return City::where('province_id', $request->province_id)->get();
    }
}
