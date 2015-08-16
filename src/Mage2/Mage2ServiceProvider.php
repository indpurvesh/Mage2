<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mage2;

use Illuminate\Support\ServiceProvider;

class Mage2ServiceProvider extends ServiceProvider {

    /**
     * Bootstrap Mage2 application services.
     *
     * @return void
     */
    public function boot() {
        $this->registerRoute();
        $this->registerThemePath();
    }

    /**
     * Register Mage2 application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    public function registerRoute() {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
    }
    
    public function registerThemePath() {
         $this->loadViewsFrom(__DIR__.'/themes', 'mage2');
    }

}
