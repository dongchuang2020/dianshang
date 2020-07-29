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

//后台
Route::any("admin/pipe_log", function () {
    return view('admin.pipe.pipe_log');
});
Route::get('/erees', function () {
    return view('erees');
});


Route::any('admin/pipe_del', 'PipeController@del');

Route::any('admin/pipe_logs', 'PipeController@pipe_logs');


//三级联动
Route::get('area','Admin\AreaController@area');
Route::any('getcity','Admin\AreaController@city');
Route::any('getarea','Admin\AreaController@getarea');

Route::middleware('check')->group(function () {


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
    Route::post('/change','admin\BrandController@change');
    Route::post('/changeName','admin\BrandController@changeName');
});

    Route::prefix('brand')->group(function () {
        Route::get('/index', 'admin\BrandController@index');
        Route::post('/add_do', 'admin\BrandController@add_do');
        Route::any('/del/{id}', 'admin\BrandController@del');
        Route::get('/edit/{id}', 'admin\BrandController@edit');
        Route::post('/update', 'admin\BrandController@update');
    });

#权限管理

    Route::prefix('chmod')->group(function () {
        Route::get('/index', 'admin\ChmodController@index');
        Route::post('/add_do', 'admin\ChmodController@add_do');
        Route::get('/del/{id}', 'admin\ChmodController@del');
        Route::any('/edit/{id}', 'admin\ChmodController@edit');
        Route::post('/update', 'admin\ChmodController@update');
    });


//广告的增删改查
    Route::any("slogan/show", "Admin\SloganController@show");
    Route::any("slogan/doadd", "Admin\SloganController@doadd");
    Route::any("slogan/del", "Admin\SloganController@del");
    Route::any("slogan/update/{id}", "Admin\SloganController@update");
    Route::any("slogan/updatedo", "Admin\SloganController@updatedo");
//角色的增删改查
    Route::any("role/show", "Admin\RoleController@show");
    Route::any("role/doadd", "Admin\RoleController@doadd");
    Route::any("role/del", "Admin\RoleController@del");
    Route::any("role/update/{id}", "Admin\RoleController@update");
    Route::any("role/updatedo", "Admin\RoleController@updatedo");
    Route::any("role/rolechmod_add/{id}", "Admin\RoleController@rolechmod_add");
    Route::any("role/rolechmod_add_do", "Admin\RoleController@rolechmod_add_do");
    Route::any("role/role", "Admin\SloganController@role");
    Route::any("cate/add_do", "Admin\CateController@add_do");
    Route::any("cate/del", "Admin\CateController@del");
    Route::any("cate/add", "Admin\CateController@add");
    Route::any("cate/index", "Admin\CateController@index");

    Route::prefix('admin')->group(function () {


        Route::any('pipe_adds', 'PipeController@pipe_adds');
        Route::any('pipe_add', 'PipeController@pipe_add');
        Route::any('pipe_zhan', 'PipeController@pipe_zhan');
        Route::any('pipe_xui', 'PipeController@pipe_xui');
    });
//给用户赋角色
    Route::any("pipe/adminrole_add/{id}", "PipeController@adminrole_add");
    Route::any("pipe/adminrole_doadd", "PipeController@adminrole_doadd");


Route::prefix('admins')->group(function () {
    //商品
    Route::get('goods','Admin\GoodsController@goodsadd');
    Route::post('do_goodsadd','Admin\GoodsController@do_goodsadd');
    Route::get('goodslist','Admin\GoodsController@goodslist');
    Route::get('delgoods','Admin\GoodsController@delgoods');
    Route::get('/upgoods/{id}','Admin\GoodsController@upgoods');
    Route::get('/guigoods/{id}','Admin\GoodsController@guigoods');
    Route::any('/do_guigoods','Admin\GoodsController@do_guigoods');
    Route::post('/do_upgoods','Admin\GoodsController@do_upgoods');
    Route::any('/gui','Admin\GoodsController@gui');


    //sku
    Route::any('/addsku','Admin\SkuController@addsku');
    Route::any('/do_addsku','Admin\SkuController@do_addsku');
    Route::any('/skulist','Admin\SkuController@skulist');
    Route::any('/delsku','Admin\SkuController@del');
    Route::any('/upsku/{id}','Admin\SkuController@upsku');
    Route::any('/do_upsku','Admin\SkuController@do_upsku');
});

//品牌的增删改查
Route::any("cate/add","Admin\CateController@add");//添加
Route::any("cate/add_do","Admin\CateController@add_do");//添加执行
Route::any("cate/index","Admin\CateController@index");//展示
Route::any("cate/del/{cate_id}","Admin\CateController@del");//删除



    Route::prefix('admins')->group(function () {
        //商品
        Route::get('goods', 'Admin\GoodsController@goodsadd');
        Route::post('do_goodsadd', 'Admin\GoodsController@do_goodsadd');
        Route::get('goodslist', 'Admin\GoodsController@goodslist');
        Route::get('delgoods', 'Admin\GoodsController@delgoods');
        Route::get('/upgoods/{id}', 'Admin\GoodsController@upgoods');
        Route::post('/do_upgoods', 'Admin\GoodsController@do_upgoods');
        //商品名称即点即改
        Route::any('chang_goodsname','Admin\GoodsController@chang_goodsname');
        //商品是否展示即点即改
        Route::any('chang_show','Admin\GoodsController@chang_show');
        //三级联动
        Route::get('area', 'Admin\AreaController@area');
        Route::any('getcity', 'Admin\AreaController@city');
        Route::any('getarea', 'Admin\AreaController@getarea');
        //sku
        Route::any('/addsku', 'Admin\SkuController@addsku');
        Route::any('/do_addsku', 'Admin\SkuController@do_addsku');
        Route::any('/skulist', 'Admin\SkuController@skulist');
        Route::any('/delsku', 'Admin\SkuController@del');
        Route::any('/upsku/{id}', 'Admin\SkuController@upsku');
        Route::any('/do_upsku', 'Admin\SkuController@do_upsku');
    });


#SKU属性值
    Route::prefix('attribute')->group(function () {
        Route::get('index', 'admin\AttrController@index');
        Route::post('add_do', 'admin\AttrController@add_do');
        Route::get('del/{id}', 'admin\AttrController@del');
        Route::any('edit/{id}', 'admin\AttrController@edit');
        Route::post('update', 'admin\AttrController@update');
    });


});





//index


Route::any('/','Index\IndexController@index');
//注册
Route::any('/index/reg','Index\IndexController@reg');
Route::any('/index/sendcode','Index\IndexController@sendcode');
Route::any('/index/do_reg','Index\IndexController@do_reg');
Route::any('/index/log','Index\IndexController@log');
Route::any('/index/do_login','Index\IndexController@do_login');
Route::any('/index/test','Index\IndexController@test');

//个人信息
Route::any('index/user_info','Index\UserinfoController@index');
Route::any('index/doadd','Index\UserinfoController@doadd');
Route::any('index/del_userinfo','Index\UserinfoController@del');
Route::any('index/up_userinfo/{id}','Index\UserinfoController@up');
Route::any('index/doup_userinfo','Index\UserinfoController@do_up');

//收货地址
Route::any('/address','Index\AddressController@address');
Route::any('/getcity','Index\AddressController@getcity');
Route::any('/getarea','Index\AddressController@getarea');
Route::any('/addressDo','Index\AddressController@addressDo');
Route::any('/addressDel','Index\AddressController@addressDel');
Route::any('/addressUpdate/{id}','Index\AddressController@addressUpdate');
Route::any('/addressUpdatedo','Index\AddressController@addressUpdatedo');
Route::any('/addressChange','Index\AddressController@addressChange');
Route::any('/indexsearch/{id}','Index\SearchController@search');

#商品详情
Route::prefix('details')->group(function(){
    Route::get('index/{id}','Index\DetailController@index');
});

