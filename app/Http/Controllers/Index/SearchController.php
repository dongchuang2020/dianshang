<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
use App\Models\ShopHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //分类 商品详情
    public function search($id)
    {
        // echo 1111;
        $search_info = DB::table('goods')->where('cate_id',$id)->get();
        // dd($search_info);

        $search_show = DB::table('goods')->leftjoin('shop_brand','goods.brand_id','=','shop_brand.brand_id')->leftjoin('shop_category','goods.cate_id','=','shop_category.cate_id')->where('goods.cate_id',$id)->first();
        // dd($search_show);

        $search_brand = DB::table('shop_brand')->leftjoin('shop_category','shop_brand.cate_id','=','shop_category.cate_id')->limit(18)->where('shop_brand.cate_id',$id)->get();
        // dd($search_brand);

        $search_cate = DB::table('shop_category')->get();
        // dd($search_cate);
        //查询数据
        $cate_info = CateModel::where('parent_id',0)->get();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        // dd($cate_info);
        //查询所有数据
        $cate_show = CateModel::get();
        //我的收藏
        $collect_info = DB::table('collect')->join('goods','goods.goods_id','=','collect.goods_id')->get();
        //浏览历史的展示
        $historyShow=ShopHistory::leftjoin("goods","shop_history.goods_id","=","goods.goods_id")->orderby('shop_history.add_time','desc')->limit(6)->get();
        return view('index.search',['historyShow'=>$historyShow,'collect_info'=>$collect_info,'cate_dt'=>$cate_dt,'cate_info'=>$cate_info,'cate_show'=>$cate_show,'search_info'=>$search_info,'search_show'=>$search_show,'search_brand'=>$search_brand,'search_cate'=>$search_cate]);
    }
}