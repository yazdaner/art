<?php

namespace Yazdan\DigitalOrder\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Payment\App\Models\Payment;
use Yazdan\Address\App\Models\Province;

class DigitalOrderController extends Controller
{
    public function checkout()
    {
        $address = Address::where('user_id', auth()->id())->first();
        $provinces = Province::all();
        return view("DigitalOrder::front.checkout",compact('address','provinces'));
    }

    public function orders()
    {
        $payments = Payment::where('user_id', auth()->id())->get();
        return view("DigitalOrder::home.index",compact('payments'));
    }
}
