<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\SkuModel;
class SkuController extends Controller
{
    public function addsku(){
        return view('admin.sku.add');
    }
    public function do_addsku(Request $request){
        $data = [];
        $data['name'] = $request -> name;
        $data['addtime'] = time();
//        if(empty($data['name'])){
//            return $this -> message('00001','属性名不能为空');
//        }
        $res = SkuModel::insert($data);
        if($res){
           $info=1;
        }else{
           $info=2;
        }
        return $info;
    }
    public function message($code , $msg , $data = []){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
    public function skulist(){
        $where = ['is_del'=>1];
        $res = SkuModel::where($where)->get()->toArray();
        return view('admin.sku.list',['data'=>$res]);
    }
    public function del(Request $request){
        $sid = $request ->post("sid");

        $where = [
           [ 'sid',"=",$sid]
        ];
        $res = SkuModel::where($where)->delete();
        if($res){
           $info=1;
        }else{
           $info=2;
        }
        return $info;
    }
    public function upsku($id){
        $where = ['sid' => $id];
        $res = DB::table('sku_name')->where($where)->first();
        return view('admin.sku.up',['data'=>$res]);
    }
    public function do_upsku(Request $request){
        $data = [];
        $data['sid'] = $request -> sid;
        $data['name'] = $request -> name;
        $whre = [
            'sid'   => $data['sid']
        ];
        $res = DB::table('sku_name')->where($whre)->update($data);
        if($res){
           $info=1;
        }else{
          $info=2;
        }
        return $info;
    }
}
