<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use App\Models\ShopHistory;

class DetailController extends Controller
{
    public function index($id){
    	$user_id=session("user_id");//用户id
    	if($user_id){
    		$data=[
    			"user_id"=>$user_id,
    			"goods_id"=>$id
    			];
    		$data["add_time"]=time();
    		$historyInfo=ShopHistory::insert($data);
    	}

        $res=GoodsModel::where('goods_id',$id)->first();
//        dd($res);exit;
        return view('Index.details.index',['res'=>$res]);
    }
    //浏览历史记录展示
    public function historyShow(Request $request){
        $historyShow=ShopHistory::leftjoin("goods","shop_history.goods_id","=","goods.goods_id")->get();
        $counts=count($historyShow);
        return view("index.details.historyShow",["historyShow"=>$historyShow,"counts"=>$counts]);
    }

}
