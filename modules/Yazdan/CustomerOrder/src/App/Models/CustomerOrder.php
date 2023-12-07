<?php

namespace Yazdan\CustomerOrder\App\Models;

use Yazdan\Media\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasMedia;

    protected $table = 'customer_orders';
    protected $guarded = [];
    protected $casts = [
        'invoicing' => 'json'
    ];
}
