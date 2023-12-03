<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Payment\Traits\PaymentTrait;
use Yazdan\Discount\Services\DiscountService;
use Yazdan\Discount\Repositories\DiscountRepository;

class Variation extends Model
{
    use PaymentTrait;

    protected $table = 'variations';
    protected $guarded = [];
    protected $appends = ['is_sale'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getIsSaleAttribute()
    {
        return ($this->price2 != null) ? true : false;
    }

    public function getPrice()
    {
        return $this->price2 ?? $this->price;
    }

    public function getDiscountAmount($discount, $quantity = 1)
    {
        $discountService = new DiscountService();
        return $discountService->calculateDiscountAmount($this, $quantity, $discount);
    }

}


