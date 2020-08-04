<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function orderadd(Request $request){
        $goods_id = $request->get('goods_id');
        $goods_id = explode(',',$goods_id);
        $sess = session('user_id');
        $data = DB::table('user_ress')->where('user_id','=',$sess)->get();
        foreach ($data as $k=>$v){
            $pro = DB::table('shop_area')->where('id','=',$v->province)->first();
            $city = DB::table('shop_area')->where('id','=',$v->city)->first();
            $area = DB::table('shop_area')->where('id','=',$v->area)->first();
            $data[$k]->di = $pro->name.$city->name.$area->name.$v->ress;
        }
        $goodss_id=implode(",",$goods_id);
        $car_data = [];
        $jia = null;
        if ($goods_id){
            foreach ($goods_id as $v){
                $where = [
                    'shop_car.goods_id'=>$v,
                    'shop_car.user_id'=>$sess
                ];
                $goods_data = DB::table('shop_car')->join('goods','shop_car.goods_id','=','goods.goods_id')
                    ->where($where)->first();
                $goods_data->jia = $goods_data->goods_price*$goods_data->buy_number;
                $jia=$jia+$goods_data->jia;
                $car_data[] = $goods_data;
            }
        }

    	return view('index.order.getorder',['data'=>$data,"goodss_id"=>$goodss_id,'car_data'=>$car_data,'jia'=>$jia]);
    }
    public function do_orderadd(Request $request){
        $data = [];
        $data['goods_id'] = $request -> get('goods_id');
        $data['goods_total'] = $request -> get('price_total');
        $data['ress_id'] = $request -> get('ress_id');
        $data['payname'] = $request -> get('payname');
        $data['user_id'] = session('user_id');
        $data['order_sn'] =time().$data['payname'].rand(1000,999).$data['user_id'];
        $data['add_time'] = time();
        $info = DB::table('shop_order')->insert($data);
        
    }
    public function message($code , $msg , $data =[]){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
}
