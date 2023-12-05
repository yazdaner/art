<?php

namespace Yazdan\Order\App\Http\Controllers;

use Illuminate\Http\Request;
use Yazdan\Order\App\Models\Order;
use App\Http\Controllers\Controller;
use Yazdan\Address\App\Models\Address;
use Yazdan\Payment\App\Models\Payment;
use Yazdan\Address\App\Models\Province;
use Yazdan\Order\App\Http\Requests\OrderRequest;
use Yazdan\Order\Repositories\OrderRepository;
use Yazdan\Payment\Repositories\PaymentRepository;
use Yazdan\Product\App\Models\Variation;

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
        $payments = Payment::where('paymentable_type',Variation::class)->where('user_id', auth()->id())->get();
        return view("Order::home.index",compact('payments'));
    }

     // Admin
     public function index()
     {
         $payments = Payment::where('status', PaymentRepository::CONFIRMATION_STATUS_SUCCESS)->latest()->paginate(9);
         return view("Order::admin.index",compact('payments'));
     }

     public function edit(Order $order)
     {
        $statuses = OrderRepository::$statuses;
        return view("Order::admin.edit",compact('order','statuses'));
     }

     public function update(Order $order,OrderRequest $request)
     {
        $this->authorize('manage', Order::class);
        OrderRepository::update($order, $request);
        newFeedbacks();
        return redirect(route('admin.orders.index'));
     }
}
