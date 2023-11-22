<?php
namespace Yazdan\Delivery\Repositories;

use Yazdan\Delivery\App\Models\Delivery;

class DeliveryRepository
{

    public static function findById($id)
    {
        return Delivery::find($id);
    }

    static $defaultDelivery = [
        'delivery_amount' => 0,
        'delivery_amount_per_product' => 0,
    ];

    public static function update($id, $data)
    {
        $delivery = static::findById($id);

        $delivery->update([
            'delivery_amount' => $data['delivery_amount'] ?? 0 ,
            'delivery_amount_per_product' => $data['delivery_amount_per_product'] ?? 0 ,
        ]);
    }
}
