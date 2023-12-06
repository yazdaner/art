<?php

namespace Yazdan\CustomerOrder\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\CustomerOrder\App\Http\Requests\CustomerOrderRequest;
use Yazdan\CustomerOrder\App\Models\CustomerOrder;
use Yazdan\CustomerOrder\Repositories\CustomerOrderRepository;

class CustomerOrderController extends Controller
{

    // home

    public function indexOrder()
    {
        $orders = CustomerOrder::where('user_id',auth()->id())->get();
        return view("CustomerOrder::home.index", compact('orders'));
    }

    public function createOrder()
    {
        $sizes = CustomerOrderRepository::$sizes;
        $canvas_types = CustomerOrderRepository::$canvas_types;
        $shapes = CustomerOrderRepository::$shapes;
        $invoicing = CustomerOrderRepository::$invoicing;

        return view("CustomerOrder::home.create", compact('sizes', 'canvas_types', 'shapes', 'invoicing'));
    }

    public function storeOrder(CustomerOrderRequest $request)
    {
        dd($request->all());
    }
}
