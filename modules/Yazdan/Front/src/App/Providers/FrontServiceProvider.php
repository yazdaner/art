<?php

namespace Yazdan\Front\App\Providers;

use Yazdan\Blog\App\Models\Blog;
use Yazdan\Coin\App\Models\Coin;
use Yazdan\Coupon\App\Models\Coupon;
use Yazdan\Slider\App\Models\Slider;
use Illuminate\Support\Facades\Route;
use Yazdan\Setting\App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Yazdan\Game\Repositories\GameRepository;
use Yazdan\Slider\Repositories\SliderRepository;
use Yazdan\Category\Repositories\CategoryRepository;

class FrontServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../../Routes/front_routes.php');

        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Front');


        view()->composer('Front::sections.slider', function ($view) {
            $sliders = Slider::where('type',SliderRepository::TYPE_MAIN)->where('status',true)->orderBy('priority')->get();
            $view->with(compact('sliders'));
        });

        view()->composer(['Front::sections.footer','Home::sections.sidebar','Contact::front.index','Blog::front.show'], function ($view) {
            $setting = Setting::first();
            $view->with(compact('setting'));
        });


        view()->composer('Front::sections.navbar', function ($view) {
            $categories = CategoryRepository::tree();
            $view->with(compact('categories'));
        });

    }
}
