<?php

namespace Yazdan\Order\App\Listeners;

use Yazdan\Order\Repositories\OrderRepository;
use Yazdan\Product\App\Models\Variation;

class CreateOrder
{

    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        if ($event->payment->paymentable_type == Variation::class) {
            OrderRepository::create($event->payment->id, OrderRepository::STATUS_PREPARING);
        }
    }
}
