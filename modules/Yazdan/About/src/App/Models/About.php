<?php

namespace Yazdan\About\App\Models;

use Yazdan\Media\App\Models\Media;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $guarded = [];

    public function banner(int $column)
    {
        return $this->belongsTo(Media::class, 'banner'.$column);
    }

    public function getModelBanner(int $column)
    {
        return $this->banner($column)->first();
    }

    public function getBanner($bannerId,$size = 'original')
    {
        if (isset($bannerId)) {
            return $this->getModelBanner($bannerId)->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }
}
