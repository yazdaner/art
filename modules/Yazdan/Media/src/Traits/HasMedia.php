<?php

namespace Yazdan\Media\Traits;

use Yazdan\Media\App\Models\Media;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasMedia
{
    use HasRelationships;

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getImage($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('img/profile.jpg');
        }
    }

}
