<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
use App\Model\GoodsModel;
use App\Models\ShopHistory;
use Illuminate\Http\Request;
use App\Model\SkuModel;
use App\Models\AttrModel;
use App\Models\BrandModel;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //分类 商品详情
    public function search($id)
    {
        $where=[
            ['is_del','=',1],
            ['is_show','=',1],
            ['cate_id','=',$id]
        ];
        // echo 1111;
        $search_info = DB::table('goods')->where('cate_id',$id)->get();
        // dd($search_info);

        $search_show = DB::table('goods')->leftjoin('shop_brand','goods.brand_id','=','shop_brand.brand_id')->leftjoin('shop_category','goods.cate_id','=','shop_category.cate_id')->where('goods.cate_id',$id)->first();
//         dd($search_show);

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
        #sku
        $sku_res=GoodsModel::leftjoin('sku_name','goods.sid','=','sku_name.sid')->where('cate_id',$id)->first();
//        dd($sku_res);
        $attr_res=AttrModel::get();
        $max_price=GoodsModel::where($where)->max('goods_price');
//        dd($max_price);
        $price=$this->getSectionPrice($max_price);
//        dd($price);
        return view('index.search',['historyShow'=>$historyShow,'collect_info'=>$collect_info,'cate_dt'=>$cate_dt,'cate_info'=>$cate_info,'cate_show'=>$cate_show,'search_info'=>$search_info,'search_show'=>$search_show,'search_brand'=>$search_brand,'search_cate'=>$search_cate,'sku_res'=>$sku_res,'attr_res'=>$attr_res,'price'=>$price]);
    }
    /**
     * 价格区间
     */
    public function getSectionPrice($max_price){
        $price=[];
        $one_price=$max_price/5;
        // echo $one_price;
        for($i=0;$i<=4;$i++){
            // dump($i);
            $start=$one_price*$i;
            // dump($start);
            $end=$one_price*($i+1)-1;
//            $price[] = $start.'-'.$end;
            // dump($end);
            // number_format — 以千位分隔符方式格式化一个数字
                $price[]=number_format($start,0).'-'.number_format($end,0);
        }
        $price[]=$max_price.'及以上';
        return $price;
    }
    public function search_price(Request $request){
        $goods_price=$request->post('goods_price');
        $cate_id=$request->post('cate_id');
        $brand_id=$request->post('brand_id');
        $a_name=$request->post('a_name');

        $a_id=$request->post('a_id')??'';
        $sid=$request->post('sid')??'';
//        dd($sid);exit;
        $where=[
            ['cate_id','=',$cate_id],
            ['is_del','=',1]
        ];


        if(!empty($sid) && !empty($a_id)){

            $where[]=['a_id','=',$a_id];
            $where[]=['sid','=',$sid];
        }

        if(!empty($brand_id)){
            $where[]= ['brand_id','=',$brand_id];
        }

        if(!empty($goods_price)){
            //价格中是否有-
            if(substr_count($goods_price,'-')>0){
                //根据-分割
                $price=explode('-',$goods_price);
                $price[0]=str_replace(',','',$price[0]);
                $price[1]=str_replace(',','',$price[1]);
//                dd($price);
                $where[]=['goods_price','>=',$price[0]];
                $where[]=['goods_price','<=',$price[1]];
            }else{
                //否则
                //把字符串转化为整数 数据类型 强制转化 自动转化
                $goods_price=(float)$goods_price;
                $where[]=['goods.goods_price','>=',$goods_price];
            }
        }
//        print_r($where);
//        dd($where);
        $search_goods_res=GoodsModel::where($where)->get();
//        $search_brand_res=BrandModel::where($where1)->get();
//        dd($search_goods_res);
        return view('index.newgoodsprice',['search_goods_res'=>$search_goods_res,'goods_price'=>$goods_price,'brand_id'=>$brand_id,'a_name'=>$a_name,'a_id'=>$a_id,'sid'=>$sid]);
    }
}