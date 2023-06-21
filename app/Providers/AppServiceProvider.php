<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// use App\Repositories\Category\CategoryInterface;
// use App\Repositories\Category\CategoryRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Category\CategoryInterface::class, \App\Repositories\Category\CategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
