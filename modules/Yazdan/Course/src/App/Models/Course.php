<?php

namespace Yazdan\Course\App\Models;

use Yazdan\Media\App\Models\Media;
use Yazdan\Comment\Trait\HasComments;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasComments;

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function video()
    {
        return $this->belongsTo(Media::class, 'video_id');
    }

    public function getImage($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }

    public function incrementReadCount() {
        $this->views++;
        return $this->save();
    }
}
