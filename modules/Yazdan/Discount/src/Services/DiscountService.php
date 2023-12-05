<?php

namespace Yazdan\Discount\Services;

class DiscountService
{
    private $discount, $productPrice, $paybleAmount;

    public function calculateDiscountAmount($product,$discount,$quantity = 1)
    {
        $this->discount = $discount;
        $this->productPrice = $product->getPrice();
        $this->paybleAmount = (($product->getPrice() * (100 - $discount->percent)) / 100);

        if ($discount->quantity_limitation) return $this->quantityLimitation($quantity);

        return $this->paybleAmount * $quantity;
    }

    public function quantityLimitation($quantity)
    {
        $VariationPrice = $this->productPrice;
        $quantity_limitation = $this->discount->quantity_limitation;
        $paybleAmount = $this->paybleAmount;

        if ($quantity_limitation) {
            if ($this->discount->percent == 100 && $quantity > 1) {
                return round(((($quantity - $quantity_limitation) * $VariationPrice + ($quantity_limitation * $paybleAmount))));
            } elseif ($quantity - $quantity_limitation < 0) {
                return round(($quantity *  $paybleAmount));
            } else {
                return round((($quantity - $quantity_limitation) * $VariationPrice + ($quantity_limitation * $paybleAmount)));
            }
        }
    }
}
