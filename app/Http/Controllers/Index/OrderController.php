<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Shop_car;
use App\Models\Order_goods;
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
        //订单表入库
        $data = [];
        $goods_id = $request -> get('goods_id');
        $goods_id=explode(",",$goods_id);
        $data['goods_total'] = $request -> get('price_total');
        $data['ress_id'] = $request -> get('ress_id');
        $data['payname'] = $request -> get('payname');
        $data['user_id'] = session('user_id');
        $data['order_sn'] =time().$data['payname'].rand(1000,999).$data['user_id'];
        $data['add_time'] = time();
        $info = DB::table('shop_order')->insert($data);
        //订单商品表入库
        $orderInfo=DB::table("shop_order")->where("order_sn",$data['order_sn'])->first();
        $order_id=$orderInfo->order_id;
        $user_id=$orderInfo->user_id;
        $order_goods = [];
        foreach($goods_id as $k=>$v){
            // var_dump($v);
            // die;
            $where=[
                'shop_car.goods_id'=>$v,
                'user_id'=>$user_id
                ];
            $order_info=Shop_car::leftjoin("goods","shop_car.goods_id","=","goods.goods_id")->where($where)->first();
            $order_goods['user_id']=$order_info['user_id'];
            $order_goods['goods_id']=$order_info['goods_id'];
            $order_goods['goods_price']=$order_info['goods_price'];
            $order_goods['buy_number']=$order_info['buy_number'];
            $result=Order_goods::insert($order_goods);
            dd($result);
            // if($result){
            //     return redirect("/payadd");
            // }
        }
                    

    }
    public function message($code , $msg , $data =[]){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
}
