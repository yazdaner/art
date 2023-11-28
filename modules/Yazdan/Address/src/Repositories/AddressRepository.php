<?php

namespace Yazdan\Address\Repositories;

use Yazdan\Address\App\Models\Address;

class AddressRepository
{


    public static function store($data)
    {
        return Address::create([
            'priority' => $data->priority,
            'media_id' => $data->media_id,
            'link' => $data->link,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
            'type' => $data->type,
        ]);
    }

    public static function update($id, $data)
    {
        Address::where('id', $id)->update([
            'priority' => $data->priority,
            'media_id' => $data->media_id,
            'link' => $data->link,
            'title' => $data->title,
            'description' => $data->description,
            'status' => $data->status,
            'type' => $data->type,
        ]);
    }

    public function delete($id)
    {
        Address::where('id', $id)->delete();
    }
}



