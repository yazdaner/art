<?php

namespace Yazdan\Slider\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasMedia;

    protected $table = 'sliders';
    protected $guarded = [];
}
