<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserinfoController extends Controller
{
    public function index(){
        $data = DB::table('user_info')->join('user','user.user_id','=','user_info.user_id')->get();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        return view('index.user_info',['cate_dt'=>$cate_dt,'data'=>$data]);
    }
    public function doadd(Request $request){
        $user_id = session('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登陆');location='/index/log'</script>";
            die;
        }
        $arr = $request -> all();
        $arr['user_id'] = $user_id;
        $data = DB::table('user_info')->insert($arr);
        if($data){
            echo "<script>location='/index/user_info'</script>";
        }else{
            echo "<script>alert('失败');location='/index/log'</script>";
        }
    }
    public function del(Request $request){
        $uid = $request -> uid;
        $where = [
            'uid'   => $uid
        ];
        $info = DB::table('user_info')->where($where)->delete();
        if($info){
            return $this -> message('00000','成功');
        }else{
            return $this -> message('00001','失败');
        }
    }
    public function up($uid){
        $res = DB::table('user_info')->where(['uid'=>$uid])->first();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        return view('index.up_userinfo',['cate_dt'=>$cate_dt,'data'=>$res]);
    }
    public function do_up(Request $request){
        $arr = $request -> all();
        $res = DB::table('user_info')->where(['uid'=>$arr['uid']])->update($arr);
        if($res){
            echo "<script>location='/index/user_info'</script>";
        }else{
            echo "<script>alert('修改失败');location='/index/user_info'</script>";
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
