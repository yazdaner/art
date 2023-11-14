<?php

namespace Yazdan\Media\App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $guarded = [];

    public function gallerisable()
    {
        return $this->morphTo();
    }
}

