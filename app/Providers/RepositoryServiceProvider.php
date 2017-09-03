<?php

namespace Cookiesoft\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Cookiesoft\Repositories\CategoryRepository::class, \Cookiesoft\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\Cookiesoft\Repositories\BillpayRepository::class, \Cookiesoft\Repositories\BillpayRepositoryEloquent::class);
        $this->app->bind(\Cookiesoft\Repositories\UserRepository::class, \Cookiesoft\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
