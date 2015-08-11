<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//Route::group(['prefix' => '/'], function() {

    Route::get('/', 'Front\CmsController@home');
    Route::get('/home', 'Front\CmsController@home');

    Route::get('/login', 'Front\CustomerController@getlogin');
    Route::get('/logout', 'Front\CustomerController@getLogout');

    Route::post('/login', 'Front\CustomerController@postLogin');

    Route::get('/register', 'Front\CustomerController@getRegister');
    Route::post('/register', 'Front\CustomerController@postRegister');

Route::get('/category/{slug}', 'Front\CategoryController@view');

Route::group(['middleware' => 'frontAuth'], function () {
    Route::get('/customer/account', 'Front\AccountController@dashboard');
});
 
Route::group(['prefix' => '/admin'], function() {

    Route::get('/login', 'Admin\AuthController@getlogin');
    Route::get('/logout', 'Admin\AuthController@getLogout');

    Route::post('/login', 'Admin\AuthController@postLogin');

    Route::get('/register', 'Admin\AuthController@getRegister');
    Route::post('/register', 'Admin\AuthController@postRegister');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'Admin\UsersController@dashboard');
        Route::resource("/entity", "Admin\EntityController");
        Route::resource("/attribute", "Admin\AttributeController");
        Route::resource("/product", "Admin\ProductController");
        Route::resource("/category", "Admin\CategoryController");

        Route::post('/product/uploadImage', "Admin\ProductController@uploadProductImage");
    });
});
