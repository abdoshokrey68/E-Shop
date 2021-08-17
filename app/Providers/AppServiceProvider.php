<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator;

// use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider
{



    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
