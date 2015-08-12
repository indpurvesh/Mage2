<?php

namespace App\Providers;

use App\Admin\Category;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class NavComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $this->composeNavigation();
    }


    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {

    }

    /**
     * Compose the navigation
     */
    private function composeNavigation()
    {

        view()->composer(['front.includes.header', 'front.category.view', 'front.product.view'], function ($view) {
            //
            $category = new Category();
            $categoryTree = $category->getCategoryTree();
            //dd($categoryTree);
            $view->with('categoryTree', $categoryTree);
        });
    }

}
