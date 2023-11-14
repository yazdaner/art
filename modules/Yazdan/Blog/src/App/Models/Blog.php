<?php

namespace Yazdan\Blog\App\Models;

use Yazdan\User\App\Models\User;
use Yazdan\Media\Traits\HasMedia;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;
use Yazdan\Category\Traits\HasCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory,HasComments,HasCategory,HasMedia;

    protected $table = 'blogs';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

    public function path()
    {
        return route('blogs.show',$this->slug);
    }
}

