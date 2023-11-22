<?php

namespace Yazdan\Delivery\App\Providers;

use Carbon\Laravel\ServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\RolePermissions\Repositories\PermissionRepository;
use Yazdan\Delivery\App\Models\Delivery;
use Yazdan\Delivery\App\Policies\DeliveryPolicy;
use Yazdan\Delivery\Database\Seeders\DeliverySeeder;

class DeliveryServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')->group(__DIR__ . '/../../Routes/delivery_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Delivery');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        DatabaseSeeder::$seeders[] = DeliverySeeder::class;
        Gate::policy(Delivery::class, DeliveryPolicy::class);
    }

    public function boot()
    {
        config()->set('sidebar.items.delivery', [
            'icon' => 'i-delivery',
            'url' => route('admin.delivery.edit'),
            'title' => 'تنظیمات',
            'permission' => PermissionRepository::PERMISSION_MANAGE_SETTING,
        ]);

    }
}
