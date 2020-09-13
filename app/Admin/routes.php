<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/users', 'UserController@index')->name('user');
    $router->get('/users/{id}', 'UserController@show')->name('show');

    //店铺
    $router->get('shops', 'ShopController@index')->name('shop.index');
    $router->get('shops/create', 'ShopController@create')->name('create');
    $router->post('/shops/{id}', 'ShopController@store')->name('store');
    //分类
    $router->get('categories', 'CategoryController@index');
    $router->get('categories/create', 'CategoryController@create');
    $router->get('categories/{id}/edit', 'CategoryController@edit');
    $router->post('categories', 'CategoryController@store');
    $router->put('categories/{id}', 'CategoryController@update');
    $router->delete('categories/{id}', 'CategoryController@destroy');
    $router->get('api/categories', 'CategoryController@apiIndex');
    //商品
    $router->get('products', 'ProductController@index');
    $router->get('products/create', 'ProductController@create');
    $router->post('products', 'ProductController@store');
    $router->get('products/{id}/edit', 'ProductController@edit');
    $router->put('products/{id}', 'ProductController@update');

    // 商品审核
    $router->get('audit', 'AuditProductController@index');
    $router->get('audit/{id}/edit', 'AuditProductController@edit');
    $router->put('audit/{id}', 'AuditProductController@update');
});
