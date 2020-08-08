<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChmodModel;

class ChmodController extends Controller
{
    public function index(){
        $res=ChmodModel::paginate(3);
        return view('admin.chmod.index',['res'=>$res]);
    }
    public function add_do(Request $request){
        $chmod_name=$request->post('chmod_name');
        $chmod_url=$request->post('chmod_url');
        $describe=$request->post('describe');
        $data=[
            'chmod_name'=>$chmod_name,
            'chmod_url'=>$chmod_url,
            'describe'=>$describe
        ];
        $re=ChmodModel::where(['chmod_name'=>$chmod_name])->first();
        if($re){
//            $msg=[
//                'status'=>'10',
//                'message'=>'权限名称已存在',
//                'url'=>'/chmod/index'
//            ];
            $info=3;
        }else{
            $res=ChmodModel::insert($data);
            if($res){
               $info=1;
            }else{
               $info=2;
            }
        }
        return $info;
    }
    public function del($id){
        $res=ChmodModel::destroy($id);
        if($res){
            $info=1;
        }else{
            $info=2;
        }
        return $info;
    }
    public function edit($id){
        $res=ChmodModel::where('chmod_id',$id)->first();
        return view('admin.chmod.edit',['res'=>$res]);
    }
    public function update(Request $request){
        $data=$request->all();
        $res=ChmodModel::where('chmod_id',$data['chmod_id'])->update($data);
        if($res!==false){
            $info=1;
        }else{
            $info=2;
        }
        return $info;
    }
}
