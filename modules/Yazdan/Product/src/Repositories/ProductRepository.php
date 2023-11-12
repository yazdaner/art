<?php

namespace Yazdan\Product\Repositories;

use Illuminate\Support\Str;
use Yazdan\Product\App\Models\Product;

class ProductRepository
{
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    static $statuses = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
    ];
    public static function getAll()
    {
        return Product::all();
    }

    public static function getAllPaginate($value)
    {
        return Product::latest()->paginate($value);
    }

    public static function create($data)
    {
        return Product::create([
            'user_id' => auth()->id(),
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'category_id' => $data->category_id,
            'media_id' => $data->media_id,
            'preview' => $data->preview,
            'content' => $data->content,
        ]);
    }

    public static function findById($id)
    {
        return Product::find($id);
    }

    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public static function updating($ProductId, $data)
    {
        return Product::whereId($ProductId)->update([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'category_id' => $data->category_id,
            'media_id' => $data->media_id ?? null,
            'preview' => $data->preview,
            'content' => $data->content,
        ]);
    }

    public static function delete($ProductId)
    {
        $Product = Product::whereId($ProductId)->first();
        $Product->comments()->delete();
        return $Product->delete();
    }

}
