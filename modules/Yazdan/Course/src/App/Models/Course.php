<?php

namespace Yazdan\Course\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\App\Models\Media;

class Course extends Model
{

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function video()
    {
        return $this->belongsTo(Media::class, 'video_id');
    }

    public function getMedia($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }
}
