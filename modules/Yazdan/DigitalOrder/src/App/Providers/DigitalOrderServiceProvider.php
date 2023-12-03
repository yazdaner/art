<?php

namespace Yazdan\DigitalOrder\App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DigitalOrderServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/digital_order_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'DigitalOrder');
    }
    public function boot()
    {
        config()->set('sidebarHome.items.orders', [
            'icon' => 'uil-orders',
            'url' => route('users.orders'),
            'title' => 'پرداخت ها'
        ]);
    }
}
