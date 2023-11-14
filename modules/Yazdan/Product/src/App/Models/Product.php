<?php

namespace Yazdan\Product\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\App\Models\Media;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function getImage($size = 'original')
    {
        if (isset($this->media_id)) {
            return $this->media->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }
}
