<?php

namespace Yazdan\Delivery\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yazdan\Delivery\App\Models\Delivery;
use Yazdan\Delivery\Repositories\DeliveryRepository;

class DeliveryController extends Controller
{
    public function edit()
    {
        $this->authorize('manage', Delivery::class);
        $delivery = Delivery::first();
        if (is_null($delivery)) {
            abort('403');
        }
        return view('Delivery::admin.edit', compact('delivery'));
    }

    public function update(Delivery $delivery, Request $request)
    {
        $this->authorize('manage', Delivery::class);

        DeliveryRepository::update($delivery->id, $request->all());
        newFeedbacks();
        return redirect()->route("admin.delivery.edit");
    }
}
