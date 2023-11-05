<?php

namespace Yazdan\Course\Repositories;

use Illuminate\Support\Str;
use Yazdan\Course\App\Models\Course;

class CourseRepository
{
    const STATUS_COMPLETED = 'completed';
    const STATUS_NOT_COMPLETED = 'not-completed';
    static $statuses = [self::STATUS_COMPLETED, self::STATUS_NOT_COMPLETED];

    public static function getAll()
    {
        return Course::all();
    }

    public static function getAllPaginate($value)
    {
        return Course::latest()->paginate($value);
    }


    public static function findById($id)
    {
        return Course::find($id);
    }

    public static function getAllExceptById($id)
    {
        return self::getAll()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public static function updating($courseId, $value)
    {
        return Course::whereId($courseId)->update([
            'title' => $value->title,
            'slug' => Str::slug($value->title),
            'category_id' => $value->category_id,
            'media_id' => $value->media_id ?? null,
            'preview' => $value->preview,
            'content' => $value->content,
        ]);
    }

    public static function delete($courseId)
    {
        $Course = Course::whereId($courseId)->first();
        $Course->comments()->delete();
        return $Course->delete();
    }

    public static function store($data)
    {
        return Course::create([
            'user_id' => auth()->id(),
            'media_id' => $data->media_id,
            'title' => $data->title,
            'slug' =>  $data->slug ? Str::slug($data->slug) : Str::slug($data->title),
            'priority' => $data->priority,
            'price' => $data->price,
            'price2' => $data->price2,
            'status' => $data->status,
            'time' => $data->time,
            'spot_course_token' => $data->spot_course_token,
            'description' => $data->description,
        ]);
    }
}
