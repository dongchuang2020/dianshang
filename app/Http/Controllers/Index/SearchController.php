<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
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
        return view('index.search',['search_info'=>$search_info,'search_show'=>$search_show,'search_brand'=>$search_brand,'search_cate'=>$search_cate]);
    }
}