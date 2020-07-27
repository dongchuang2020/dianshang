<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    //
    public function index(){
        $goods_info = DB::table('goods')->leftjoin('shop_category','goods.cate_id','=','shop_category.cate_id')->get();

        return view('index.index',['goods_info'=>$goods_info]);
    }
}
