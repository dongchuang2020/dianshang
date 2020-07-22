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
            $msg=[
                'status'=>'10',
                'message'=>'权限名称已存在',
                'url'=>'/chmod/index'
            ];
        }else{
            $res=ChmodModel::insert($data);
            if($res){
                $msg=[
                    'status'=>'200',
                    'message'=>'添加成功',
                    'url'=>'/chmod/index'
                ];
            }else{
                $msg=[
                    'status'=>'100',
                    'message'=>'添加失败',
                    'url'=>''
                ];
            }
        }
        return json_encode($msg);
    }
    public function del($id){
        $res=ChmodModel::destroy($id);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'删除成功',
                'url'=>'/chmod/index'
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
        $res=ChmodModel::where('chmod_id',$id)->first();
        return view('admin.chmod.edit',['res'=>$res]);
    }
    public function update(Request $request){
        $data=$request->all();
        $res=ChmodModel::where('chmod_id',$data['chmod_id'])->update($data);
        if($res==1){
            $msg=[
                'status'=>'200',
                'message'=>'修改成功',
                'url'=>'/chmod/index'
            ];
        }else if($res==0){
            $msg=[
                'status'=>'10',
                'message'=>'数据未做任何修改',
                'url'=>'/chmod/index'
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
