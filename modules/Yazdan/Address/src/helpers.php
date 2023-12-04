<?php

use Yazdan\Address\App\Models\City;
use Yazdan\Address\App\Models\Province;

function province_name($provinceId)
{
    return Province::findOrFail($provinceId)->name;
}

function city_name($cityId)
{
    return City::findOrFail($cityId)->name;
}
