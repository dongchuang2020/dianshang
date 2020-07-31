<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function guo_add(Request $request){
        $goods_id = $request->get('goods_id');
        $user_id = $request->get('user_id');
        $man = $request->get('man');
        $where = [
            'goods_id'=>$goods_id,
            'user_id'=>$user_id,
            'ls_del'=>1
        ];
        $car_da = DB::table('shop_car')->where($where)->first();
        if ($car_da){
            $man = $car_da->buy_number+$man;
            $data = DB::table('shop_car')->where($where)->update(['buy_number'=>$man]);
            if ($data){
                return '加入成功' ;
            }else{
                return '加入失败';
            }
        }else{
            $where = [
                'goods_id'=>$goods_id,
                'user_id'=>$user_id,
                'buy_number'=>$man,
                'add_time'=>time()
            ];
            $data = DB::table('shop_car')->insert($where);
            if ($data){
                return '加入成功' ;
            }else{
                return '加入失败';
            }
        }
    }
    public function cart_index(Request $request){
        $user_id = session('user_id');
        if ($user_id){
            $wh = [
                'user_id'=>$user_id,
                'ls_del'=>1
            ];
            $cart_da = DB::table('shop_car')->where($wh)->get();
            $where = [];
            foreach ($cart_da as $v){
                $data = DB::table('goods')->where('goods_id','=',$v->goods_id)->first();
                $data->buy = $v->buy_number;
                //dd($data);
                $where[] = $data;
            }
        }
        return view('index.cart',['cart_data'=>$where,'name'=>0]);
    }
}
