<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\App\Models\Media;

class Product extends Model
{

    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }


    public function getImage($size = 'original')
    {
        if (isset($this->avatar_id)) {
            return $this->avatar->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }
}
