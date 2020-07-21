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
Route::prefix('admin')->group(function (){
    Route::get('pipe_add', function () {
        return view('admin.pipe.pipe_add');
    });
    Route::any("pipe_log",function (){
        return view('admin.pipe.pipe_log');
    });
    Route::any('pipe_adds','PipeController@pipe_adds');
    Route::any('pipe_zhan','PipeController@pipe_zhan');
    Route::any('pipe_zhan','PipeController@pipe_');
});
