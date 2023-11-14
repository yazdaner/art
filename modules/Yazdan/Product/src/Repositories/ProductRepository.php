<?php

namespace Yazdan\Product\Repositories;

use Illuminate\Support\Str;
use Yazdan\Media\App\Models\Media;
use Yazdan\Media\App\Models\Gallery;
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


    public static function delete($id)
    {
        $product = Product::whereId($id)->first();

        // gallery
        $images = $product->galleries;
        foreach($images as $image){
            $image->media->delete();
        }

        // media
        destroyImage($product);

        //comment
        $product->comments()->delete();

        //product
        $product->delete();

        return true;
    }

    public static function store($data)
    {
        $product = Product::create([
            'media_id' => $data->media_id,
            'category_id' => $data->category_id,
            'title' => $data->title,
            'slug' =>  $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'delivery_amount' => $data->delivery_amount,
            'delivery_amount_per_product' => $data->delivery_amount_per_product,
            'status' => $data->status,
            'body' => $data->body,
        ]);

        foreach($data->images_id as $image_id){
            Gallery::create([
                'gallerisable_id' => $product->id,
                'gallerisable_type' => Product::class,
                'media_id' => $image_id,
            ]);
        }
    }

    public static function update($id,$data)
    {
        return Product::whereId($id)->update([
            'media_id' => $data->media_id,
            'category_id' => $data->category_id,
            'title' => $data->title,
            'slug' =>  $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'delivery_amount' => $data->delivery_amount,
            'delivery_amount_per_product' => $data->delivery_amount_per_product,
            'status' => $data->status,
            'body' => $data->body,
        ]);
    }

}
