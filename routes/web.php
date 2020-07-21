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

//广告的增删改查
Route::any("slogan/show","Admin\SloganController@show");
Route::any("slogan/doadd","Admin\SloganController@doadd");
Route::any("slogan/del","Admin\SloganController@del");
Route::any("slogan/update/{id}","Admin\SloganController@update");
Route::any("slogan/updatedo","Admin\SloganController@updatedo");
//角色的增删改查
Route::any("role/role","Admin\SloganController@role");
