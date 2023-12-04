<?php

namespace Yazdan\Address\App\Models;

use Yazdan\Address\App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Address\App\Models\Province;

class Address extends Model
{
    protected $table = 'addresses';
    protected $guarded = [];


    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}

