<?php

namespace Yazdan\Order\Repositories;

use Yazdan\Order\App\Models\Order;

class OrderRepository
{
    const STATUS_PROCESSING = 'processing';
    const STATUS_PREPARING = 'preparing';
    const STATUS_SENT = 'sent';
    static $statuses = [self::STATUS_PROCESSING, self::STATUS_PREPARING, self::STATUS_SENT];


    public static function create($payment_id,$status)
    {
        return Order::create([
            'payment_id' => $payment_id,
            'status' => $status,
        ]);
    }

    public static function update($order,$data)
    {
        return $order->update([
            'status' => $data->status,
            'tracking_code' => $data->tracking_code,
        ]);
    }
}
