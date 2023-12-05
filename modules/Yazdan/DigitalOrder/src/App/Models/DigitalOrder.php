<?php

namespace Yazdan\DigitalOrder\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class DigitalOrder extends Model
{
    use HasMedia;

    protected $table = 'orders';
    protected $guarded = [];
}
