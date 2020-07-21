<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/admin_home', function () {
    return view('admin.home');
});
Route::prefix('admin')->group(function () {
    Route::get('goods','Admin\GoodsController@goodsadd');
    Route::post('do_goodsadd','Admin\GoodsController@do_goodsadd');
    Route::get('goodslist','Admin\GoodsController@goodslist');
    Route::get('delgoods','Admin\GoodsController@delgoods');
    Route::get('/upgoods/{id}','Admin\GoodsController@upgoods');
    Route::post('/do_upgoods','Admin\GoodsController@do_upgoods');
});
