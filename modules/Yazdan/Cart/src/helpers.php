<?php

use Yazdan\Delivery\App\Models\Delivery;
use Yazdan\Discount\Repositories\DiscountRepository;

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

function cartTotal()
{
    $cartTotal = 0;
    foreach (\Cart::getContent() as $item) {
        $cartTotal += $item->quantity * $item->associatedModel->price;
    }
    return $cartTotal;
}

function cartCodeDiscountTotal()
{
    $cartCodeDiscountTotal = 0;
    foreach (\Cart::getContent() as $item) {
        $discount = DiscountRepository::getValidDiscountByCode(session()->get('code'), $item->associatedModel->product);
        if (!is_null($discount)) {
            $cartCodeDiscountTotal += $item->associatedModel->getDiscountAmount($discount,$item['quantity']);
        }
    }
    return $cartCodeDiscountTotal;
}


function cartTotalCodeSaleAmount()
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
