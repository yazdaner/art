<?php

use Yazdan\Delivery\App\Models\Delivery;

function cartTotal()
{
    $cartTotal = 0;
    foreach (\Cart::getContent() as $item) {
        $cartTotal += $item->quantity * $item->associatedModel->price;
    }
    return $cartTotal;
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
