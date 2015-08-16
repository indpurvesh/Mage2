<?php

/*
  |--------------------------------------------------------------------------
  | Mage2 Application Routes
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
Route::get('/product/{slug}', ['as' => 'product.view', 'uses' => 'Front\ProductController@view']);

Route::post('/order', 'Front\OrderController@index');

Route::get('/cart', 'Front\CartController@index');
Route::get('/checkout', 'Front\checkoutController@index');


Route::post('/cart/addtocart/{id}', 'Front\CartController@addtocart');
Route::post('/cart/deletecartitem/{id}', 'Front\CartController@deletecartitem');
Route::post('/cart/updatecartitem', 'Front\CartController@updatecartitem');


Route::group(['middleware' => 'frontAuth'], function () {
    Route::get('/customer/account', 'Front\AccountController@dashboard');

    //User Billing Address CRUD
    Route::get('/customer/account/billing', 'Front\AccountController@billing');
    Route::post('/customer/account/billing', 'Front\AccountController@storeBilling');

    Route::get('/customer/account/billing/add', 'Front\AccountController@addBilling');
    Route::get('/customer/account/billing/{billing}/edit', 'Front\AccountController@editBilling');

    Route::patch('/customer/account/billing/{billing}', 'Front\AccountController@updateBilling');

    //User Shipping Address CRUD
    Route::get('/customer/account/shipping', 'Front\AccountController@shipping');
    Route::post('/customer/account/shipping', 'Front\AccountController@storeShipping');

    Route::get('/customer/account/shipping/add', 'Front\AccountController@addShipping');
    Route::get('/customer/account/shipping/{shipping}/edit', 'Front\AccountController@editShipping');

    Route::patch('/customer/account/shipping/{shipping}', 'Front\AccountController@updateShipping');
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
        Route::resource("/customer-group", "Admin\CustomerGroupController");

        Route::post('/product/uploadImage', "Admin\ProductController@uploadProductImage");
    });
});
