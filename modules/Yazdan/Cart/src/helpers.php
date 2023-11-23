<?php

use Yazdan\Delivery\App\Models\Delivery;

function cartTotalSaleAmount()
{
    $cartTotalSaleAmount = 0;
    foreach (\Cart::getContent() as $item) {
        if ($item->attributes->is_sale) {
            $cartTotalSaleAmount += $item->quantity * ($item->attributes->price - $item->attributes->price2);
        }
    }
    return $cartTotalSaleAmount;
}

function cartTotalDeliveryAmount()
{
    $productCount = 0;

    foreach (\Cart::getContent() as $item) {
        $productCount += $item->quantity;
    }

    $delivery = Delivery::first();
    $delivery_amount = $delivery->delivery_amount;
    $delivery_amount_per_product = $delivery->delivery_amount_per_product;
    if ($productCount == 1) return $delivery_amount;
    if ($productCount == 0) return 0;
    return $delivery_amount + (($productCount - 1) * $delivery_amount_per_product);
}
