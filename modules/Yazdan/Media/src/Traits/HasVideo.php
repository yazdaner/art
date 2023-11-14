<?php

namespace Yazdan\Media\Traits;

use Yazdan\Media\App\Models\Media;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasVideo
{
    use HasRelationships;

    public function video()
    {
        return $this->belongsTo(Media::class, 'video_id');
    }

}
