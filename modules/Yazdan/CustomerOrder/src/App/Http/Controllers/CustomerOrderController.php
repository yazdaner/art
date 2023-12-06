<?php

namespace Yazdan\CustomerOrder\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yazdan\Common\Responses\AjaxResponses;
use Yazdan\Media\Services\MediaFileService;
use Yazdan\CustomerOrder\App\Http\Requests\CustomerOrderRequest;
use Yazdan\CustomerOrder\App\Models\CustomerOrder;
use Yazdan\CustomerOrder\Repositories\CustomerOrderRepository;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $this->authorize('manage', CustomerOrder::class);
        $sliders = CustomerOrderRepository::all();
        $types = CustomerOrderRepository::$types;
        return view("CustomerOrder::index", compact('sliders', 'types'));
    }

    public function store(CustomerOrderRequest $request)
    {
        $this->authorize('manage', CustomerOrder::class);

       $request = storeImage($request);
        CustomerOrderRepository::store($request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function edit(CustomerOrder $slider)
    {
        $this->authorize('manage', CustomerOrder::class);
        $types = CustomerOrderRepository::$types;
        return view("CustomerOrder::edit", compact('slider', 'types'));
    }

    public function update(CustomerOrder $slider, CustomerOrderRequest $request)
    {
        $this->authorize('manage', CustomerOrder::class);

        $request = updateImage($request,$slider);

        CustomerOrderRepository::update($slider->id, $request);
        newFeedbacks();
        return redirect()->route('admin.sliders.index');
    }

    public function destroy(CustomerOrder $slider)
    {
        $this->authorize('manage', CustomerOrder::class);
        destroyImage($slider);
        $slider->delete();
        return AjaxResponses::SuccessResponses();
    }
}
