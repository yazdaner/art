<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'product_variations';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
