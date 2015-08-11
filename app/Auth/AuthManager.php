<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;

class AuthManager extends \Illuminate\Auth\AuthManager
{

    protected function createEloquentProvider()
    {
        $model = 'App\Front\Customer';

        return new EloquentUserProvider($this->app['hash'], $model);
    }

    public function createEloquentDriver()
    {
        $provider = $this->createEloquentProvider();

        return new Guard($provider, $this->app['session.store']);
    }

}