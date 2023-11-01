<?php

namespace Yazdan\Product\Repositories;

use Illuminate\Support\Str;
use Yazdan\Product\App\Models\Product;

class ProductRepository
{
    public static function getAll()
    {
        return Product::all();
    }

    public static function getAllPaginate($value)
    {
        return Product::latest()->paginate($value);
    }

    public static function create($value)
    {
        return Product::create([
            'user_id' => auth()->id(),
            'title' => $value->title,
            'slug' => Str::slug($value->title),
            'category_id' => $value->category_id,
            'media_id' => $value->media_id,
            'preview' => $value->preview,
            'content' => $value->content,
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

    public static function updating($ProductId, $value)
    {
        return Product::whereId($ProductId)->update([
            'title' => $value->title,
            'slug' => Str::slug($value->title),
            'category_id' => $value->category_id,
            'media_id' => $value->media_id ?? null,
            'preview' => $value->preview,
            'content' => $value->content,
        ]);
    }

    public static function delete($ProductId)
    {
        $Product = Product::whereId($ProductId)->first();
        $Product->comments()->delete();
        return $Product->delete();
    }

}
