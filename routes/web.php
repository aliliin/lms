<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    echo phpinfo();
//    return view('welcome');
//});

//Route::get('wxcode', "WechatController@wxcode");
//Route::get('wxtoken', "WechatController@wxtoken");
Route::auth();
Route::redirect('login', '/WeChat')->name('wechat');
Route::redirect('/', '/index')->name('index');
Route::any('WeChat', "WechatController@auth")->middleware('wechat.oauth')->name('Login.WeChat');

Route::post('uploadFile', "UploadsImgController@uploadImages")->name('admin.uploadFile'); // 图片上传
// 商品首页列表，不登陆也可以访问
Route::get('index', "ProductsController@index")->name('products.index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('products/{product}', "ProductsController@show")->name('products.show');
    Route::post('cart', 'CartController@add')->name('cart.add');
    Route::get('cart', 'CartController@index')->name('cart.index');
});



