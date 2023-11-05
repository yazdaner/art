<?php

namespace Yazdan\Blog\Repositories;

use Illuminate\Support\Str;
use Yazdan\Blog\App\Models\Blog;

class BlogRepository
{
    public static function getAll()
    {
        return Blog::all();
    }

    public static function getAllPaginate($value)
    {
        return Blog::latest()->paginate($value);
    }

    public static function create($data)
    {
        return Blog::create([
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
        return Blog::find($id);
    }

    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public static function updating($blogId, $data)
    {
        return Blog::whereId($blogId)->update([
            'title' => $data->title,
            'slug' => $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'category_id' => $data->category_id,
            'media_id' => $data->media_id ?? null,
            'preview' => $data->preview,
            'content' => $data->content,
        ]);
    }

    public static function delete($blogId)
    {
        $blog = Blog::whereId($blogId)->first();
        $blog->comments()->delete();
        return $blog->delete();
    }

}
