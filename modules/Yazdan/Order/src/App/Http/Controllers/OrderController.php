<?php

namespace Yazdan\Order\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Payment\App\Models\Payment;
use Yazdan\Address\App\Models\Province;
use Yazdan\Payment\Repositories\PaymentRepository;

class OrderController extends Controller
{
    // Front
    public function checkout()
    {
        $address = Address::where('user_id', auth()->id())->first();
        $provinces = Province::all();
        return view("Order::front.checkout",compact('address','provinces'));
    }

    // Home
    public function orders()
    {
        $payments = Payment::where('user_id', auth()->id())->get();
        return view("Order::home.index",compact('payments'));
    }

     // Admin
     public function index()
     {
         $payments = Payment::where('status', PaymentRepository::CONFIRMATION_STATUS_SUCCESS)->latest()->paginate(9);
         return view("Order::admin.index",compact('payments'));
     }
}
