<?php

namespace Yazdan\Discount\Services;

class DiscountService
{
    private $discount, $variationPrice, $paybleAmount;

    public function calculateDiscountAmount($variation, $quantity, $discount)
    {
        $this->discount = $discount;
        $this->variationPrice = $variation->getPrice();
        $this->paybleAmount = (($variation->getPrice() * (100 - $discount->percent)) / 100);

        if ($discount->max_amount) return self::maxAmount();
        if ($discount->quantity_limitation) return self::quantityLimitation($quantity);

        return $this->paybleAmount;
    }

    public function maxAmount()
    {
        $max_amount = $this->discount->max_amount;
        $VariationPrice = $this->variationPrice;
        $paybleAmount = $this->paybleAmount;
        $discountAmount = $VariationPrice - $paybleAmount;

        return ($discountAmount > $max_amount ? $VariationPrice - $max_amount :  $paybleAmount);
    }

    public function quantityLimitation($quantity)
    {
        $VariationPrice = $this->variationPrice;
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
