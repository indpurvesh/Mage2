<?php

/*
  Copyright (c) 2015, Purvesh
  All rights reserved.

  Redistribution and use in source and binary forms, with or without
  modification, are permitted provided that the following conditions are met:

 * Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

 * Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

 * Neither the name of Mage2 nor the names of its
  contributors may be used to endorse or promote products derived from
  this software without specific prior written permission.

  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
  AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
  IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
  DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
  FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
  DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
  SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
  CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
  OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
  OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mage2;

use Mage2\Core\Auth\AuthManager;
use Mage2\Admin\Helpers\AttributeHelper;
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
        $this->registerFrontAuth();
    }

    /**
     * Register Mage2 application services.
     *
     * @return void
     */
    public function register() {

        $this->app->bind('AttriibuteHelper', function() {
            return  new AttributeHelper;
        });
       
        $this->app->alias('AttriibuteHelper', 'Mage2\Admin\Helpers\AttributeHelper');
    }

    public function registerRoute() {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
    }

    public function registerThemePath() {
        $this->loadViewsFrom(__DIR__ . '/themes', 'mage2');
    }

    public function registerFrontAuth() {
        $this->app->singleton('front.auth', function ($app) {
            $app['front.auth.loaded'] = true;
            return new AuthManager($app);
        });

        $this->app->singleton('front.auth.driver', function ($app) {
            return $app['front.auth']->driver();
        });

        $this->app->alias('front.auth', 'Mage2\Core\Auth\AuthManager');

        $this->app->alias('front.auth.driver', 'Mage2\Core\Auth\Guard');
    }
    
    /**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('AttriibuteHelper');
	}

}
