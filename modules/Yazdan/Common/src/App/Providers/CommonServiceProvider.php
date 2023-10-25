<?php

namespace Yazdan\Common\App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/common_routes.php');
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../Resources','Common');
    }
}
