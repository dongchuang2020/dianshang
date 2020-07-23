<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\AdminRole;

class PipeController extends Controller
{
    //
    public function pipe_add(){
        return view('admin.pipe.pipe_add');
    }

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
        $res=Role::leftjoin('admin_role','role.role_id','=','admin_role.role_id')->get();
        // var_dump($res);exit;
        return view('admin.pipe.pipe_zhan',['data'=>$data,"res"=>$res]);
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
        if ($mi == $data->pwd && $data->is_del == 1){
            session(['id'=>$data->admin_id]);
            session(['name'=>$data->admin_name]);
            return '成功';
        }else{
            return '密码错误';
        }
    }
    public function adminrole_add($id){
        $res=Role::get();
        return view("admin.pipe.adminrole_add",["res"=>$res,"admin_id"=>$id]);
    }
    public function adminrole_doadd(Request $request){
        $admin_id=$request->post('admin_id');
        // dd($admin_id);exit;
        $role_id=$request->post('role_id');
        // var_dump($role_id);exit;
        $role_id=explode(',',$role_id);
        // dd($role_id);exit;
        foreach($role_id as $k=>$v){
            // var_dump($v);
            $data=[
                'role_id'=>$v,
                'admin_id'=>$admin_id
            ];
            $res=AdminRole::insert($data);
            // dd($res);die;
        }
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'赋权成功',
                'url'=>'/admin/pipe_zhan'
            ];
        }else{
            $msg=[
                'status'=>'100',
                'message'=>'赋权失败',
                'url'=>''
            ];
        }
        return json_encode($msg);   
    }

    public function del(Request $request){
        $request->session()->flush();
        return redirect('admin/pipe_log');
    }

}
