<?php

namespace Yazdan\CustomerOrder\Repositories;

use Yazdan\CustomerOrder\App\Models\CustomerOrder;

class CustomerOrderRepository
{
    const TYPE_MAIN = 'main';

    static $types = [self::TYPE_MAIN];


    public static function all()
    {
        return CustomerOrder::query()->orderBy("priority")->get();
    }


    public static function findById($id)
    {
        return CustomerOrder::findOrFail($id);
    }

    public static function store($data)
    {
        return CustomerOrder::create([
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
        CustomerOrder::where('id', $id)->update([
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
        CustomerOrder::where('id', $id)->delete();
    }
}



