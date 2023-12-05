<?php

namespace Yazdan\DigitalOrder\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yazdan\Course\App\Models\Course;
use Yazdan\Payment\App\Models\Payment;
use Yazdan\Payment\Services\PaymentService;
use Yazdan\DigitalOrder\App\Models\DigitalOrder;
use Yazdan\Discount\App\Http\Requests\CodeRequest;
use Yazdan\Payment\Repositories\PaymentRepository;
use Yazdan\Discount\Repositories\DiscountRepository;
use Yazdan\DigitalOrder\Repositories\DigitalOrderRepository;

class DigitalOrderController extends Controller
{
    // Front
    public function digitalCheckout(Course $course)
    {
        return view("DigitalOrder::front.checkout",compact('course'));
    }

    public function buy(Course $course)
    {
        $course->buy();
    }


   


    // Home
    public function orders()
    {
        $payments = Payment::where('user_id', auth()->id())->get();
        return view("DigitalOrder::home.index",compact('payments'));
    }

     // Admin
     public function index()
     {
         $payments = Payment::where('status', PaymentRepository::CONFIRMATION_STATUS_SUCCESS)->latest()->paginate(9);
         return view("DigitalOrder::admin.index",compact('payments'));
     }

     public function edit(DigitalOrder $order)
     {
        $statuses = DigitalOrderRepository::$statuses;
        return view("DigitalOrder::admin.edit",compact('order','statuses'));
     }

     public function update(DigitalOrder $order,Request $request)
     {
        $this->authorize('manage', DigitalOrder::class);
        DigitalOrderRepository::update($order, $request);
        newFeedbacks();
        return redirect(route('admin.orders.index'));
     }
}
