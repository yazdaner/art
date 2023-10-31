<?php

namespace Yazdan\Category\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Blog\App\Models\Blog;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function getParentAttribute()
    {
        return !($this->parent_id) ? 'ندارد' : $this->parentCategory->title;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    public function path()
    {
        return route('categories.show',$this->slug);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}

