<?php

namespace Yazdan\Category\Repositories;

use Illuminate\Support\Str;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Category\App\Models\Category;
use Yazdan\Product\App\Models\Product;

class CategoryRepository
{
    static $types = [
        'products' => Product::class,
        'blogs' => Blog::class
    ];

    public static function getAll()
    {
        return Category::all();
    }

    public static function getAllPaginate($value)
    {
        return Category::latest()->paginate($value);
    }

    public static function create($data)
    {
        if($data->parent_id != null){
            $data->type = null;
        }
        return Category::create([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'parent_id' => $data->parent_id,
            'type' => $data->type,
        ]);
    }

    public static function findById($id)
    {
        return Category::find($id);
    }

    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function($item) use ($id){
            return $item->id != $id;
        });
    }

    public static function updating($categoryId,$data)
    {
        if($data->parent_id != null){
            $data->type = null;
        }
        return Category::whereId($categoryId)->update([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'parent_id' => $data->parent_id,
            'type' => $data->type,
        ]);
    }

    public static function delete($categoryId)
    {
        return Category::whereId($categoryId)->delete();
    }

    public static function tree()
    {
        return Category::where('parent_id',null)->with('subCategory')->get();
    }
}
