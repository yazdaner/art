<?php

namespace Yazdan\Course\App\Providers;

use Illuminate\Support\Facades\Gate;
use Yazdan\Course\App\Models\Course;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Yazdan\Course\App\Policies\CoursePolicy;
use Yazdan\RolePermissions\Repositories\PermissionRepository;

class CourseServiceProvider extends ServiceProvider
{

    public function register()
    {
        Route::middleware('web')
                ->group(__DIR__ . '/../../Routes/course_routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/migrations/');
        $this->loadViewsFrom(__DIR__ . '/../../Resources/views/', 'Course');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../../Resources/Lang/');
        Gate::policy(Course::class,CoursePolicy::class);
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.courses', [
                'icon' => 'i-courses',
                'url' => route('admin.courses.index'),
                'title' => 'دوره های آموزشی',
                'permission' => PermissionRepository::PERMISSION_MANAGE_COURSE,
            ]);
        });
    }

}
