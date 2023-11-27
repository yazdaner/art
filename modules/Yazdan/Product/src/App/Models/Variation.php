<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\PaymentTrait;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\Repositories\DiscountRepository;

class Variation extends Model
{
    protected $table = 'variations';
    protected $guarded = [];
    protected $appends = ['is_sale' , 'percent_sale'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getIsSaleAttribute()
    {
        return ($this->price2 != null) ? true : false;
    }

    public function getPercentSaleAttribute()
    {
        return $this->is_sale ? round((($this->price - $this->price2) / $this->price) * 100) : null;
    }

    public function getPrice()
    {
        return $this->price2 ?? $this->price;
    }

    public function getDiscountWithCode()
    {
        if (session()->has('code') == null || !$this->product->discounts) return null;

        $discount = DiscountRepository::findByCode(session()->get('code'));
        if (!$discount) return null;

        // return discount type all
        if ($discount->type == 'all') return $discount;

        // return special discount of this product who has code
        foreach ($this->product->discounts as $item) {
            if ($item->id == $discount->id) {
                return $item;
            }
        }
    }

    public function getDiscountPercent()
    {
        $getDiscountWithCode = $this->getDiscountWithCode() ? $this->getDiscountWithCode()->percent : null;
        if ($getDiscountWithCode == null) return 0;
        if ($getDiscountWithCode != null) return $getDiscountWithCode;
    }

    public function getDiscountAmount($discount, $quantity = 1)
    {
        $discountService = new DiscountService();
        return $discountService->calculateDiscountAmount($this, $quantity, $discount);
    }

    public function getTotalDiscountAmount()
    {
       return (($this->getPercentSaleAttribute() / 100) * $this->getDiscountPercent()) + $this->getPercentSaleAttribute();
    }
}


