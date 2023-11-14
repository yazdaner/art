<?php

namespace Yazdan\Course\App\Models;

use App\Models\User;
use Yazdan\Media\Traits\HasMedia;
use Yazdan\Media\Traits\HasVideo;
use Yazdan\Media\App\Models\Media;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasComments,HasMedia,HasVideo;

    protected $guarded = [];

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }

    public function path()
    {
        return route('courses.show',$this->slug);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPrice()
    {
        if($this->price2 == null){
            return number_format($this->price);
        }
        return [
            'price' => number_format($this->price),
            'price2' => number_format($this->price2),
        ];
    }
}
