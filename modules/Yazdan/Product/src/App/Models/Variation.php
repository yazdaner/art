<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
