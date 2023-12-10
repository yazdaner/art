<?php

namespace Yazdan\CustomerOrder\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\CustomerOrder\App\Models\CustomerOrder;
use Yazdan\CustomerOrder\App\Policies\CustomerOrderPolicy;

class CustomerOrderServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/customer_order_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'CustomerOrder');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');

        Gate::policy(CustomerOrder::class, CustomerOrderPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.customerOrders', [
            'icon' => 'i-orders',
            'url' => route('admin.customerOrders.index'),
            'title' => 'سفارشات مشتری',
            'permission' => PermissionRepository::PERMISSION_MANAGE_CUSTOMER_ORDER,
        ]);

        config()->set('sidebarHome.items.customerOrders', [
            'icon' => 'uil-orders',
            'url' => route('customer.orders.index'),
            'title' => 'سفارش نقاشی'
        ]);
    }
}
