<?php

namespace Yazdan\Payment\App\Providers;

use Yazdan\Order\App\Listeners\CreateOrder;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;
use Yazdan\DigitalOrder\App\Listeners\CreateLicense;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        PaymentWasSuccessful::class => [
            CreateOrder::class,
            CreateLicense ::class,
        ]
    ];

    public function boot()
    {
        //
    }
}
