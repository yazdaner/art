<?php

namespace Yazdan\Media\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasMedia;

    protected $table = 'galleries';
    protected $guarded = [];

    public function gallerisable()
    {
        return $this->morphTo();
    }
}

