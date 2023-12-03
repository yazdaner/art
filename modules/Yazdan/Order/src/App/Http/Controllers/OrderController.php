<?php

namespace Yazdan\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Address\App\Models\Province;

class OrderController extends Controller
{
    public function checkout()
    {
        $address = Address::where('user_id', auth()->id())->first();
        $provinces = Province::all();
        return view("Order::front.checkout",compact('address','provinces'));
    }
}
