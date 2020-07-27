<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BrandModel;
use App\Models\Slogan;
class IndexController extends Controller
{
    public function index(){
        $goods_where = [
            'goods.is_del'  => 1,
            'goods.cate_id' => 27,
            'goods.is_hot'  => 1
        ];
        $goods_info = DB::table('goods')->leftjoin('shop_category','goods.cate_id','=','shop_category.cate_id')->where($goods_where)->get();
        $brand_res=BrandModel::get();
        $sloganInfo=Slogan::where(["is_del"=>2])->get();
        return view('index.index',['brand_res'=>$brand_res,"sloganInfo"=>$sloganInfo,'goods_info'=>$goods_info]);
    }
}
