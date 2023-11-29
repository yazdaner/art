<?php

namespace Yazdan\Address\App\Models;

use Yazdan\Address\App\Models\City;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $guarded = [];


    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}

