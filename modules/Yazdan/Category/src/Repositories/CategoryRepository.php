<?php

namespace Yazdan\Category\Repositories;

use Illuminate\Support\Str;
use Yazdan\Category\App\Models\Category;

class CategoryRepository
{
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
        return Category::create([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'parent_id' => $data->parent_id,
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
        return Category::whereId($categoryId)->update([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'parent_id' => $data->parent_id,
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
