<?php

namespace Yazdan\CustomerOrder\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Blog\Repositories\BlogRepository;
use Yazdan\CustomerOrder\App\Models\CustomerOrder;
use Yazdan\CustomerOrder\Repositories\CustomerOrderRepository;
use Yazdan\CustomerOrder\App\Http\Requests\CustomerOrderRequest;

class CustomerOrderController extends Controller
{

    // admin

    public function index()
    {
        $orders = CustomerOrder::latest()->paginate(env('PAGINATION_COUNT'));
        return view("CustomerOrder::admin.index", compact('orders'));
    }

    public function sendResponse($order,Request $request)
    {
        $CustomerOrder = CustomerOrder::find($order);
        $CustomerOrder->update([
            'response' => $request->response,
        ]);
        newFeedbacks();
        return redirect(route('admin.customerOrders.index'));
    }

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
        $request = storeImage($request);
        CustomerOrderRepository::create($request);
        newFeedbacks();
        return redirect(route('customer.orders.index'));
    }
}
