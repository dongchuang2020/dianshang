<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PipeController extends Controller
{
    //
    public function pipe_adds(Request $request){
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
        $data = DB::table('admin')->get();
        return view('admin.pipe.pipe_zhan',['data'=>$data]);
    }
    public function pipe_logs(Request $request){
        $yong  = $request->get('yong');
        $mi  = $request->get('mi');
        $mi = md5($mi);
        $data = DB::table('admin')->where('admin_name','=',$yong)->first();

    }
}
