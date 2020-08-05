<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
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
    //购物车列表
    public function cart_index(Request $request){
            $user_id = session('user_id');
            if(empty($user_id)){
                echo "<script>alert('请先登陆');location='/index/log'</script>";
                die;
            }
            $wh = [
                'user_id'=>$user_id,
                'ls_del'=>1
            ];
            $cart_da = DB::table('shop_car')->leftjoin('goods','goods.goods_id','=','shop_car.goods_id')->where($wh)->get();
            $cate_dt = CateModel::where('cate_nav_show',1)->get();

        return view('index.cart',['cate_dt'=>$cate_dt,'cart_data'=>$cart_da]);
    }
    //添加购物车
    public function addcart(Request $request){
        $goods_id = $request -> goods_id;
        $buy_number = $request -> buy_number;
        $user_id = session('user_id');
        $goods_price = DB::table('goods')->where(['goods_id'=>$goods_id])->value('goods_price');
        if(empty($user_id)){
            // $this -> addCartCookie($goods_id,$buy_number,$goods_price);
            // die;
             echo "<script>alert('请先登录');location='/index/log'</script>";
        }
        $where = [
            'user_id'   => $user_id,
            'goods_id'  => $goods_id,
            'ls_del'    => 1
        ];
        $cart_info = DB::table('shop_car')->where($where)->first();
        if($cart_info){
            $result = $this -> checkGoodsNum($goods_id,$buy_number,$cart_info->buy_number);
            if($result==false){
                echo "<script>alert('商品超过库存');location='/index/cart_index'</script>";
                die;
            }
            $buy_number = $buy_number+$cart_info->buy_number;
            $time = time();
            $upcart = DB::table('shop_car')->where($where)->update(['buy_number'=>$buy_number,'add_time'=>$time]);
            if($upcart){
                echo "<script>alert('加入购物车成功');location='/index/cart_index'</script>";
            }else{
                echo "<script>alert('加入购物车失败');location='/index/addcart'</script>";
            }
        }else{
            $result = $this -> checkGoodsNum($goods_id,$buy_number,$cart_info->buy_number);
            if($result==false){
                echo "<script>alert('商品超过库存');location='/index/cart_index'</script>";
                die;
            }
            $data['goods_id'] = $goods_id;
            $data['buy_number'] = $buy_number;
            $data['user_id'] = $user_id;
            $data['add_time'] = time();
            $addcart = DB::table('shop_car')->insert($data);
            if($addcart){
                echo "<script>alert('加入购物车成功');location='/index/cart_index'</script>";
            }else{
                echo "<script>alert('加入购物车失败');location='/index/addcart'</script>";
            }
        }
    }
    //加入购物车cookie
    public function addCartCookie($goods_id,$buy_number,$goods_price){
        $cartCookie = [];
//        $cartCookie = cookie('cartinfo');
//        if(!empty($cartCookie)){
//            if(array_key_exists($goods_id,$cartCookie)){
//                $cartCookie['buy_number'] = $buy_number+$cartCookie['buy_number'];
//                $cartCookie['time'] = time();
//            }else{
//                $cartCookie = ['goods_id'=>$goods_id,'buy_number'=>$buy_number,'goods_price'=>$goods_price];
//            }
//        }else{
            //检测库存
            $cartCookieinfo = $this -> checkGoodsNum($goods_id,$buy_number);
            if($cartCookieinfo==false){
                echo "<script>alert('商品超过库存');location='/index/cart_index'</script>";
                die;
            }
            $cartCookie = ['goods_id'=>$goods_id,'buy_number'=>$buy_number,'time'=>time(),'goods_price'=>$goods_price];
            setcookie('cartinfo',serialize($cartCookie));

//        }
    }
    //检测库存
    public function checkGoodsNum($goods_id,$buy_number,$already_number=0){
        $goods_num = DB::table('goods')->where(['goods_id'=>$goods_id])->value('goods_num');
        if(($buy_number+$already_number)>$goods_num){
            return false;
        }else{
            return true;
        }
    }
    //改变文本框的值
    public function checknum(Request $request){
        $goods_id = $request -> goods_id;
        $buy_number = $request -> buy_number;
        $user_id = session('user_id');
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id,
            'ls_del'    => 1
        ];
        $buy_info = DB::table('shop_car')->where($where)->update(['buy_number'=>$buy_number]);
        if($buy_info){
                return $this -> message('00001','成功');
            }else{
                return $this -> message('00002','失败');
        }
    }
    //获取小计
    public function total(Request $request){
        $goods_id = $request -> goods_id;
        $goods_price = DB::table('goods')->where(['goods_id'=>$goods_id])->value('goods_price');
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => session('user_id'),
            'ls_del'    => 1
        ];
        $buy_number = DB::table('shop_car')->where($where)->value('buy_number');
        return $total = $buy_number*$goods_price;
    }
    //获取总价
    public function getprice(Request $request){
        $goods_id = $request -> goods_id;
        $user_id = session('user_id');
        $goods_id = explode(',',$goods_id);
        $data = [];
        foreach ($goods_id as $v) {
            $where = [
                ['goods.goods_id', '=',$v],
                ['shop_car.user_id', '=', $user_id],
                ['shop_car.ls_del', '=', 1]
            ];
            $res = DB::table('shop_car')->join('goods', 'goods.goods_id', '=', 'shop_car.goods_id')->where($where)->first();
            $data[] = $res;
        }
        $zongjia = 0;
        foreach ($data as $v){
            $zongjia += $v->buy_number*$v->goods_price;
        }
        return $zongjia;
    }
    //删除
    public function del(Request $request){
        $goods_id = $request -> goods_id;
        $where = [
            'ls_del'    => 1,
            'goods_id'  => $goods_id,
            'user_id'   => session('user_id')
        ];
        $del = DB::table('shop_car')->where($where)->update(['ls_del'=>2]);
        if($del){
            return $this -> message('00000','删除成功');
        }else{
            return $this -> message('00001','删除失败');
        }
    }
    //删除选中的商品
    public function delall(Request $request){
        $goods_id = $request -> goods_id;
        $user_id = session('user_id');
        $goods_id = explode(',',$goods_id);
        $data = false;
        foreach ($goods_id as $v){
            $where = [
                ['goods_id','=',$v],
                ['user_id','=',$user_id]
            ];
            $res = DB::table('shop_car')->where($where)->update(['ls_del'=>2]);
            if ($res){
                $data = true;
            }
        }
        if($data){
            return $this -> message('00000','删除成功');
        }else{
            return $this -> message('00001','删除失败');
        }
    }
    public function message($code , $msg , $data = []){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
    public function cookies(){
      var_dump(unserialize($_COOKIE['cartinfo']));
    }
}
