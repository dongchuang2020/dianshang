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

//广告的增删改查
Route::any("slogan/show","Admin\SloganController@show");
Route::any("slogan/doadd","Admin\SloganController@doadd");
Route::any("slogan/del","Admin\SloganController@del");
Route::any("slogan/update/{id}","Admin\SloganController@update");
Route::any("slogan/updatedo","Admin\SloganController@updatedo");
//角色的增删改查
Route::any("role/show","Admin\RoleController@show");
Route::any("role/doadd","Admin\RoleController@doadd");
Route::any("role/del","Admin\RoleController@del");
Route::any("role/update/{id}","Admin\RoleController@update");
Route::any("role/updatedo","Admin\RoleController@updatedo");
Route::any("role/rolechmod_add/{id}","Admin\RoleController@rolechmod_add");
Route::any("role/rolechmod_add_do","Admin\RoleController@rolechmod_add_do");
Route::any("role/role","Admin\SloganController@role");
Route::any("cate/add_do","Admin\CateController@add_do");
Route::any("cate/del","Admin\CateController@del");
Route::any("cate/add","Admin\CateController@add");
Route::any("cate/index","Admin\CateController@index");

Route::prefix('admin')->group(function (){
    Route::get('pipe_add', function () {
        return view('admin.pipe.pipe_add');
    });
    Route::any("pipe_log", function () {
        return view('admin.pipe.pipe_log');
    });
    Route::any('pipe_adds','PipeController@pipe_adds');
    Route::any('pipe_zhan','PipeController@pipe_zhan');
    Route::any('pipe_xui','PipeController@pipe_xui');
    Route::any('pipe_logs','PipeController@pipe_logs');
});
//给用户赋角色
Route::any("pipe/adminrole_add/{id}","PipeController@adminrole_add");
Route::any("pipe/adminrole_doadd","PipeController@adminrole_doadd");

Route::prefix('admins')->group(function () {
    //商品
    Route::get('goods','Admin\GoodsController@goodsadd');
    Route::post('do_goodsadd','Admin\GoodsController@do_goodsadd');
    Route::get('goodslist','Admin\GoodsController@goodslist');
    Route::get('delgoods','Admin\GoodsController@delgoods');
    Route::get('/upgoods/{id}','Admin\GoodsController@upgoods');
    Route::post('/do_upgoods','Admin\GoodsController@do_upgoods');
    //三级联动
    Route::get('area','Admin\AreaController@area');
    Route::any('getcity','Admin\AreaController@city');
    Route::any('getarea','Admin\AreaController@getarea');
    //sku
    Route::any('/addsku','Admin\SkuController@addsku');
    Route::any('/do_addsku','Admin\SkuController@do_addsku');
    Route::any('/skulist','Admin\SkuController@skulist');
    Route::any('/delsku','Admin\SkuController@del');
    Route::any('/upsku/{id}','Admin\SkuController@upsku');
    Route::any('/do_upsku','Admin\SkuController@do_upsku');
});
