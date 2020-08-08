<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttrModel;
use App\Model\SkuModel;

class AttrController extends Controller
{
    public function index(){
        $res=AttrModel::leftjoin('sku_name','attribute.sid','=','sku_name.sid')->paginate(5);
        $re=SkuModel::get();
        return view('admin.attribute.index',['res'=>$res,'re'=>$re]);
    }
    public function add_do(Request $request){
        $a_name=$request->post('a_name');
        $sid=$request->post('sid');
        $add_time=time();
        $data=[
            'a_name'=>$a_name,
            'sid'=>$sid,
            'add_time'=>$add_time
        ];
        $res=AttrModel::insert($data);
        if($res){
            $info=1;
        }else{
            $info=2;
        }
        return $info;
    }
    public function del($id){
        $res=AttrModel::destroy($id);
        if($res){
            $info=1;
        }else{
            $info=2;
        }
        return $info;
    }
    public function edit($id){
        $re=SkuModel::get();
        $res=AttrModel::where("a_id",$id)->first();
        return view('admin.attribute.edit',['res'=>$res,'re'=>$re]);
    }
    public function update(Request $request){
        $a_id=$request->post('a_id');
        $a_name=$request->post('a_name');
        $sid=$request->post('sid');
//        dd($a_id);exit;
        $data=[
            'a_id'=>$a_id,
            'sid'=>$sid,
            'a_name'=>$a_name
        ];
        $res=AttrModel::where('a_id',$a_id)->update($data);
        if($res){
            $info=1;
        }else{
            $info=2;
        }
        return $info;
    }
}
