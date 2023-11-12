<?php

namespace Yazdan\Product\App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Yazdan\Product\App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Yazdan\Product\App\Policies\ProductPolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class ProductServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
                ->group(__DIR__ . '/../../Routes/product_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Product');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        Gate::policy(Product::class,ProductPolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.products', [
                'icon' => 'i-products',
                'url' => route('admin.products.index'),
                'title' => 'محصولات',
                'permission' => PermissionRepository::PERMISSION_MANAGE_PRODUCT,
            ]);
        });
    }

}
