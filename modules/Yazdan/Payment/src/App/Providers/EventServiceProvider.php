<?php

namespace Yazdan\Payment\App\Providers;

use Yazdan\Order\App\Listeners\CreateOrder;
use Yazdan\Payment\App\Events\PaymentWasSuccessful;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        PaymentWasSuccessful::class => [
            CreateOrder::class,
        ]
    ];

    public function boot()
    {
        //
    }
}
