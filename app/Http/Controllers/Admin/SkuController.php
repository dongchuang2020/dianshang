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
        if(empty($data['name'])){
            return $this -> message('00001','属性名不能为空');
        }
        $res = SkuModel::insert($data);
        if($res){
            return $this -> message('00000','成功');
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
    public function skulist(){
        $res = SkuModel::get()->toArray();
        
    }
}
