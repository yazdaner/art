<?php

namespace Yazdan\Address\App\Providers;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Address\Database\Seeders\AddressSeeder;

class AddressServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/address_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Address');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        DatabaseSeeder::$seeders[] = AddressSeeder::class;
    }

    public function boot()
    {
        config()->set('sidebarHome.items.address', [
            'icon' => 'uil-address',
            'url' => route('address'),
            'title' => 'آدرس'
        ]);
    }
}
