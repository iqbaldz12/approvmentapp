<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Core\KTBootstrap;
use Illuminate\Database\Schema\Builder;
=======
<<<<<<< HEAD
use App\Core\KTBootstrap;
use Illuminate\Database\Schema\Builder;
=======
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
     *
     * @return void
     */
    public function register()
<<<<<<< HEAD
=======
=======
     */
    public function register(): void
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    {
        //
    }

    /**
     * Bootstrap any application services.
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
     *
     * @return void
     */
    public function boot()
    {
        // Update defaultStringLength
        Builder::defaultStringLength(191);

        KTBootstrap::init();
<<<<<<< HEAD
=======
=======
     */
    public function boot(): void
    {
        //
>>>>>>> 5a59e6c4d843fc0ba5b4d569831e8e3ed33330a1
>>>>>>> 8c8decbd13737634609000997c3c5fddf960d7c8
    }
}
