<?php

namespace Yazdan\Front\App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Blog\App\Models\Blog;
use Yazdan\Coin\App\Models\Coin;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Setting\App\Models\Setting;
use Yazdan\Slider\App\Models\Slider;
use Yazdan\Slider\Repositories\SliderRepository;

class FrontServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/front_routes.php');

        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Front');


        // view()->composer('Front::sections.CTA', function ($view) {
        //     $cta = Slider::where('type',SliderRepository::TYPE_CTA)->where('status',true)->orderBy('priority')->first();
        //     $view->with(compact('cta'));
        // });

    }
}
