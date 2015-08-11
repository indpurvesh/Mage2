<?php

namespace App\Providers;

use App\Auth\AuthManager;
use Illuminate\Support\ServiceProvider;

class FrontAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

   public function register()
    {
        $this->app->singleton('front.auth', function ($app) {
            $app['front.auth.loaded'] = true;

            return new AuthManager($app);
        });

        $this->app->singleton('front.auth.driver', function ($app) {
            return $app['front.auth']->driver();
        });

        $this->app->alias('front.auth', 'App\Auth\AuthManager');

        $this->app->alias('front.auth.driver', 'App\Auth\Guard');
    }

}
