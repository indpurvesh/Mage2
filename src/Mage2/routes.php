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
  |--------------------------------------------------------------------------
  | Mage2 Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', 'Mage2\Front\Controller\CmsController@home');
Route::get('/home', 'Mage2\Front\Controller\CmsController@home');

Route::get('/login', 'Mage2\Front\Controller\CustomerController@getlogin');
Route::get('/logout', 'Mage2\Front\Controller\CustomerController@getLogout');

Route::post('/login', 'Mage2\Front\Controller\CustomerController@postLogin');

Route::get('/register', 'Mage2\Front\Controller\CustomerController@getRegister');
Route::post('/register', 'Mage2\Front\Controller\CustomerController@postRegister');

Route::get('/category/{slug}', 'Mage2\Front\Controller\CategoryController@view');
Route::get('/product/{slug}', ['as' => 'product.view', 'uses' => 'Mage2\Front\Controller\ProductController@view']);

Route::post('/order', 'Mage2\Front\Controller\OrderController@index');

Route::get('/cart', 'Mage2\Front\Controller\CartController@index');
Route::get('/checkout', 'Mage2\Front\Controller\checkoutController@index');


Route::post('/cart/addtocart/{id}', 'Mage2\Front\Controller\CartController@addtocart');
Route::post('/cart/deletecartitem/{id}', 'Mage2\Front\Controller\CartController@deletecartitem');
Route::post('/cart/updatecartitem', 'Mage2\Front\Controller\CartController@updatecartitem');


Route::group(['middleware' => 'frontAuth'], function () {
    Route::get('/customer/account', 'Mage2\Front\Controller\AccountController@dashboard');

    //User Billing Address CRUD
    Route::get('/customer/account/billing', 'Mage2\Front\Controller\AccountController@billing');
    Route::post('/customer/account/billing', 'Mage2\Front\Controller\AccountController@storeBilling');

    Route::get('/customer/account/billing/add', 'Mage2\Front\Controller\AccountController@addBilling');
    Route::get('/customer/account/billing/{billing}/edit', 'Mage2\Front\Controller\AccountController@editBilling');

    Route::patch('/customer/account/billing/{billing}', 'Mage2\Front\Controller\AccountController@updateBilling');

    //User Shipping Address CRUD
    Route::get('/customer/account/shipping', 'Mage2\Front\Controller\AccountController@shipping');
    Route::post('/customer/account/shipping', 'Mage2\Front\Controller\AccountController@storeShipping');

    Route::get('/customer/account/shipping/add', 'Mage2\Front\Controller\AccountController@addShipping');
    Route::get('/customer/account/shipping/{shipping}/edit', 'Mage2\Front\Controller\AccountController@editShipping');

    Route::patch('/customer/account/shipping/{shipping}', 'Mage2\Front\Controller\AccountController@updateShipping');
});



//Route::group(['prefix' => '/'], function() {

Route::group(['prefix' => '/admin'], function () {

    Route::get('/login', 'Mage2\Admin\Controller\AuthController@getlogin');
    Route::get('/logout', 'Mage2\Admin\Controller\AuthController@getLogout');

    Route::post('/login', 'Mage2\Admin\Controller\AuthController@postLogin');

    Route::get('/register', 'Mage2\Admin\Controller\AuthController@getRegister');
    Route::post('/register', 'Mage2\Admin\Controller\AuthController@postRegister');

    Route::group(['middleware' => 'auth', 'namespace' => 'Mage2'], function () {
        Route::get('/', 'Admin\Controller\UsersController@dashboard');
        Route::resource("/entity", "Admin\Controller\EntityController");
        Route::resource("/attribute", "Admin\Controller\AttributeController");
        Route::resource("/product", "Admin\Controller\ProductController");
        Route::resource("/category", "Admin\Controller\CategoryController");
        Route::resource("/customer-group", "Admin\Controller\CustomerGroupController");

        Route::post('/product/uploadImage', "Admin\Controller\ProductController@uploadProductImage");
        Route::get('/settings', "Admin\Controller\SettingsController@index");
    });
});
