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

#后台品牌
Route::prefix('brand')->group(function(){
    Route::get('/index','admin\BrandController@index');
    Route::post('/add_do','admin\BrandController@add_do');
    Route::any('/del/{id}','admin\BrandController@del');
    Route::get('/edit/{id}','admin\BrandController@edit');
    Route::post('/update','admin\BrandController@update');
});
#权限管理
Route::prefix('chmod')->group(function(){
    Route::get('/index','admin\ChmodController@index');
    Route::post('/add_do','admin\ChmodController@add_do');
    Route::get('/del/{id}','admin\ChmodController@del');
    Route::any('/edit/{id}','admin\ChmodController@edit');
    Route::post('/update','admin\ChmodController@update');
});