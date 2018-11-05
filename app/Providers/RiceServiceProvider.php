<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //吃饭服务
        $this->app->bind('rice', \App\Rice::class);
        class_alias(\App\RiceFacade::class,'Rice');
    }
}
