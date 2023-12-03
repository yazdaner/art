<?php

namespace Yazdan\Order\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasMedia;

    protected $table = 'orders';
    protected $guarded = [];
}
