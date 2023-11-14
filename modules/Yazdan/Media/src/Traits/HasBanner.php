<?php

namespace Yazdan\Media\Traits;

use Yazdan\Media\App\Models\Media;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

trait HasBanner
{
    use HasRelationships;

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
        if ($this->getModelBanner($bannerId)) {
            return $this->getModelBanner($bannerId)->thumb($size);
        } else {
            return asset('assets/images/user.png');
        }
    }

}
