<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * The path to the "home" route for your application.
=======
<<<<<<< HEAD
     * The path to the "home" route for your application.
=======
     * The path to your application's "home" route.
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    public const HOME = '/login';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
<<<<<<< HEAD
=======
=======
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
<<<<<<< HEAD
=======
=======
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
}
