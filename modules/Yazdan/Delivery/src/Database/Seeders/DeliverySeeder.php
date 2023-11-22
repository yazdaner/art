<?php

namespace Yazdan\Delivery\Database\Seeders;

use Illuminate\Database\Seeder;
use Yazdan\Delivery\App\Models\Delivery;
use Yazdan\Delivery\Repositories\DeliveryRepository;

class DeliverySeeder extends Seeder
{

    public function run()
    {
        Delivery::firstOrCreate(['delivery_amount' => DeliveryRepository::$defaultDelivery['delivery_amount']],
        [
            'delivery_amount' => DeliveryRepository::$defaultDelivery['delivery_amount'],
            'delivery_amount_per_product' => DeliveryRepository::$defaultDelivery['delivery_amount_per_product'],
        ]);
    }
}
