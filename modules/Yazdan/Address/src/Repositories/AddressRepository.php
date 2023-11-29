<?php

namespace Yazdan\Address\Repositories;

use Yazdan\Address\App\Models\Address;

class AddressRepository
{

    public static function store($data)
    {
        return Address::updateOrCreate(['user_id' => auth()->id()],[
            'user_id' => auth()->id(),
            'name' => $data->name,
            'phone' => $data->phone,
            'province_id' => $data->province_id,
            'city_id' => $data->city_id,
            'address' => $data->address,
            'postal_code' => $data->postal_code
        ]);
    }

}



