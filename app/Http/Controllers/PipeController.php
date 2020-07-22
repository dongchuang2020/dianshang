<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PipeController extends Controller
{
    //
    public function pipe_adds(Request $request){
        $id = $request->get('id');
        if ($id){
            $yong = $request->get('yong');
            $dian = $request->get('dian');
            $you = $request->get('you');
            if (!$yong){
                $data = DB::table('admin')->where('admin_id','=',$id)->update(['is_del'=>2]);
                if ($data){
                    return '删除成功';
                }else{
                    return '删除失败';
                }
            }
            $da = [
                'admin_name'=>$yong,
                'tel'=>$dian,
                'email'=>$you,
            ];
            $data = DB::table('admin')->where('admin_id','=',$id)->update($da);
            if ($data){
                return '修改成功';
            }else{
                return '修改失败';
            }
        }
        $yong = $request->get('yong');
        $mi = $request->get('mi');
        $dian = $request->get('dian');
        $you = $request->get('you');
        $mi = md5($mi);
        $da = [
            'admin_name'=>$yong,
            'pwd'=>$mi,
            'tel'=>$dian,
            'email'=>$you,
            'add_time'=>time()
        ];
        $data = DB::table('admin')->insert($da);
        if ($data){
            return '添加成功';
        }else{
            return '添加失败';
        }
    }
    public function pipe_zhan(){
        $data = DB::table('admin')->where('is_del','=',1)->paginate(3);
        return view('admin.pipe.pipe_zhan',['data'=>$data]);
    }
    public function pipe_xui(Request $request){
        $id = $request->get('id');
        $data = DB::table('admin')->where('admin_id','=',$id)->first();
        return view('admin.pipe.pipe_xui',['data'=>$data]);
    }
    public function pipe_logs(Request $request){
        $yong  = $request->get('yong');
        $mi  = $request->get('mi');
        $mi = md5($mi);
        $data = DB::table('admin')->where('admin_name','=',$yong)->first();
        if(!$data){
            return '管理员名错误';
        }
//        echo $mi;
//        dd($data->pwd);
        if ($mi == $data->pwd){
            return '成功';
        }else{
            return '密码错误';
        }

    }
}
