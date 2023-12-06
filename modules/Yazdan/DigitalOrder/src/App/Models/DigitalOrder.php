<?php

namespace Yazdan\DigitalOrder\App\Models;

use Yazdan\Payment\App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class DigitalOrder extends Model
{
    protected $table = 'digital_orders';
    protected $guarded = [];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }

}
