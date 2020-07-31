<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Models\ShopHistory;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryModel;
use App\Models\SkuGoodsModel;
use App\Models\AttrModel;
use App\Model\SkuModel;
class DetailController extends Controller
{
    public function index($id){
        //浏览历史记录添加
    	$user_id=session("user_id");//用户id
    	if($user_id){
    		$data=[
    			"user_id"=>$user_id,
    			"goods_id"=>$id
    			];
    		$data["add_time"]=time();
    		$historyInfo=ShopHistory::insert($data);
    	}

        //收藏
        $res=GoodsModel::where('goods_id',$id)->first();
        $user_id= session('user_id');
        $collect_where = [
            'goods_id'  => $id,
            'user_id'   => $user_id,
            'is_del'    => 1
        ];
        $collect_info = DB::table('collect')->where($collect_where)->first();
        $sku_goods_res=SkuGoodsModel::where('goods_id',$id)->get();
        $data=[];
        foreach($sku_goods_res as $v) {
            $attribute_res = AttrModel::where('a_id', '=',$v->a_id)->first();
            $data[]=$attribute_res;
        }
        $da=[];
        foreach($data as $v) {
            $shu_name_res =SkuModel::where('sid', '=',$v->sid)->first();
            $da[]=$shu_name_res;
        }
        $da=array_unique($da);
     //  dd($da);exit;
        return view('Index.details.index',['res'=>$res,'sku_goods_res'=>$sku_goods_res,'data'=>$data,'da'=>$da,'info'=>$collect_info]);
    }
    //浏览历史记录展示
    public function historyShow(Request $request){
        $historyShow=ShopHistory::leftjoin("goods","shop_history.goods_id","=","goods.goods_id")->get();
        $counts=count($historyShow);
        return view("index.details.historyShow",["historyShow"=>$historyShow,"counts"=>$counts]);
    }

}
