<?php

namespace Yazdan\About\App\Models;

use Illuminate\Database\Eloquent\Model;
use Yazdan\Media\Traits\HasBanner;

class About extends Model
{
    use HasBanner;

    protected $table = 'abouts';
    protected $guarded = [];

}
