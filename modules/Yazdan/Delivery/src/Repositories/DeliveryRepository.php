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
        'telephone' => 'telephone',
        'email' => 'email',
        'address' => 'address',
        'description' => 'description',
        'copyright' => 'copyright',
        'instagram' => 'instagram',
        'telegram' => 'telegram',
        'facebook' => 'facebook',
        'whatsapp' => 'whatsapp',
        'youtube' => 'youtube',
        'linkedin' => 'linkedin',
        'twitter' => 'twitter',
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
