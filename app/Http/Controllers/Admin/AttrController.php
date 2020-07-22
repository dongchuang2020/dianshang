<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttrModel;

class AttrController extends Controller
{
    public function index(){
        $res=AttrModel::get();
        return view('admin.attribute.index',['res'=>$res]);
    }
    public function add_do(Request $request){
        $a_name=$request->post('a_name');
        $add_time=time();
        $data=[
            'a_name'=>$a_name,
            'add_time'=>$add_time
        ];
        $res=AttrModel::insert($data);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'添加成功',
                'url'=>'/attribute/index'
            ];
        }else{
            $msg=[
                'status'=>'100',
                'message'=>'添加失败',
                'url'=>''
            ];
        }
        return json_encode($msg);
    }
    public function del($id){
        $res=AttrModel::destroy($id);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'删除成功',
                'url'=>'/attribute/index'
            ];
        }else{
            $msg=[
                'status'=>'100',
                'message'=>'删除失败',
                'url'=>''
            ];
        }
        return json_encode($msg);
    }
    public function edit($id){
        $res=AttrModel::where("a_id",$id)->first();
        return view('admin.attribute.edit',['res'=>$res]);
    }
    public function update(Request $request){
        $a_id=$request->post('a_id');
        $a_name=$request->post('a_name');
//        dd($a_id);exit;
        $data=[
            'a_id'=>$a_id,
            'a_name'=>$a_name
        ];
        $res=AttrModel::where('a_id',$a_id)->update($data);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'修改成功',
                'url'=>'/attribute/index'
            ];
        }else{
            $msg=[
                'status'=>'100',
                'message'=>'修改失败',
                'url'=>''
            ];
        }
        return json_encode($msg);
    }
}
