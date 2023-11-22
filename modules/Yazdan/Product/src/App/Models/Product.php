<?php

namespace Yazdan\Product\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Yazdan\Media\App\Models\Gallery;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\Traits\HasCategory;
use Yazdan\Payment\Traits\PaymentTrait;

class Product extends Model
{
    use HasComments,HasMedia,HasCategory,PaymentTrait;

    protected $table = 'products';
    protected $guarded = [];
    protected $appends = ['quantity_check', 'sale_check', 'price_check'];

    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'gallerisable');
    }

    public function variations()
    {
        return $this->hasMany(Variation::class,'product_id');
    }

    public function path()
    {
        return route('products.show',$this->slug);
    }

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

    public function getSaleCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->where('price2', '!=', null)->orderBy('price2')->first() ?? false;
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }

    public function getPriceCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->orderBy('price')->first() ?? false;
    }
}
