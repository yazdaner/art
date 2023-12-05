<?php

namespace Yazdan\DigitalOrder\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\DigitalOrder\App\Models\DigitalOrder;
use Yazdan\DigitalOrder\App\Policies\DigitalOrderPolicy;

class DigitalOrderServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/digital_order_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'DigitalOrder');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang');

    }
    public function boot()
    {
        config()->set('sidebar.items.orders', [
            'icon' => 'i-orders',
            'url' => route('admin.orders.index'),
            'title' => 'محصولات خریداری شده',
            'permission' => PermissionRepository::PERMISSION_MANAGE_ORDER,
        ]);

        config()->set('sidebarHome.items.orders', [
            'icon' => 'uil-orders',
            'url' => route('users.orders'),
            'title' => 'پرداخت ها'
        ]);
    }
}
