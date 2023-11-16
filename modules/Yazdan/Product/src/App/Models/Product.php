<?php

namespace Yazdan\Product\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Yazdan\Media\App\Models\Gallery;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\Traits\HasCategory;

class Product extends Model
{
    use HasComments,HasMedia,HasCategory;

    protected $table = 'products';
    protected $guarded = [];

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

    // public function getPrice()
    // {
    //     if($this->price2 == null){
    //         return number_format($this->price);
    //     }
    //     return [
    //         'price' => number_format($this->price),
    //         'price2' => number_format($this->price2),
    //     ];
    // }
    public function getPrice()
    {
       return number_format($this->variations->min('price'));
    }
}
