<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CollectController extends Controller
{
    public function add(Request $request){
        $goods_id = $request -> goods_id;
        $user_id = session('user_id');
        if(empty($user_id)){
            return $this -> message('00001','请先登录');
        }
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id,
            'is_del'    => 1
        ];
        $info = DB::table('collect')->where($where)->first();
        if($info){
            return $this -> message('00002','商品已收藏');
        }
        unset($where['is_del']);
        $data_info = DB::table('collect')->where($where)->first();
        if ($data_info){
            $da_info = DB::table('collect')->where($where)->update(['is_del'=>1]);
            return $this -> message('00000','收藏成功');
        }
        $data = [];
        $data['goods_id'] = $goods_id;
        $data['user_id'] = $user_id;
        $data['is_del'] = 1;
        $data['add_time'] = time();
        $res = DB::table('collect')->insert($data);
        if($res){
            return $this -> message('00000','收藏成功');
        }else{
            return $this -> message('00003','收藏失败');
        }
    }
    public function del(Request $request)
    {
        $goods_id = $request->goods_id;
        $user_id = session('user_id');
        if (empty($user_id)) {
            return $this->message('00001', '请先登录');
        }
        $where = [
            'goods_id'  => $goods_id,
            'user_id'   => $user_id
        ];
        $res = DB::table('collect')->where($where)->update(['is_del'=>2]);
        if($res){
            return $this -> message('00000','取消收藏成功');
        }else{
            return $this -> message('00002','失败');
        }

    }
    public function message($code , $msg , $data = []){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
}
