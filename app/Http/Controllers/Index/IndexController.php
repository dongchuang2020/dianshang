<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BrandModel;
use App\Model\GoodsModel;
use App\Models\Slogan;
class IndexController extends Controller
{
    public function index(Request $request){
        $goods_name=$request->post('goods_name');
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like','%$goods_name%'];
        }
        $sloganInfo=Slogan::where(["is_del"=>2])->get();//广告展示
    	$sloganInfo2=Slogan::where(["is_del"=>2])->limit(1)->get();
        $goods_where = [

            'parent_id' => 0,

        ];
        $goods_info = DB::table('shop_category')->where($goods_where)->limit(3)->get();
        foreach ($goods_info as $k=>$v){
            $goods_cate = DB::table('shop_category')->where('parent_id','=',$v->cate_id)->get();
            $goods_data = DB::table('goods')->where('cate_id','=',$v->cate_id)->get();
            $v->cate = $goods_cate;
            $v->data = $goods_data;
            foreach ($goods_cate as $vv){
                $goods_datas = DB::table('goods')->where('cate_id','=',$vv->cate_id)->get();
                foreach ($goods_datas as $n){
                    if ($n){
                        $v->data[] = $n;
                    }
                }
            }
        }

        //查询数据
        $cate_info = CateModel::where('parent_id',0)->get();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        // dd($cate_info);
        //查询所有数据
        $cate_show = CateModel::get();
        //  dd($goods_info);
        $brand_res=BrandModel::limit(16)->get();
        $b_res=BrandModel::limit(10)->get();
        $g_res=GoodsModel::orderBy('goods_click','desc')->limit(3)->get();
//        dd($g_res);exit;
//        dd($brand_res);exit;
        $sloganInfo=Slogan::where(["is_del"=>2])->get();
        return view('index.index',['cate_dt'=>$cate_dt,'cate_info'=>$cate_info,'cate_show'=>$cate_show,'brand_res'=>$brand_res,"sloganInfo"=>$sloganInfo,'goods_info'=>$goods_info,"sloganInfo2"=>$sloganInfo2,'g_res'=>$g_res,'b_res'=>$b_res]);
    }
    public function reg(){
        return view('index.reg');
    }
    public function do_reg(Request $request){
        $data = $request -> all();

        if(empty($data['user_name'])){
            return $this -> message('00001','用户名不能为空');
        }

        if(empty($data['user_pwd'])){
            return $this -> message('00001','密码不能为空');
        }

        if(empty($data['user_pwd1'])){
            return $this -> message('00001','确认密码不能为空');
        }

        if(empty($data['phone'])){
            return $this -> message('00001','手机号不能为空');
        }

        if(empty($data['code'])){
            return $this -> message('00001','验证码不能为空');
        }

        if($data['user_pwd'] != $data['user_pwd1']){
            return $this -> message('00001','确认密码跟密码不一致');
        }

        $res = DB::table('code')->where(['phone'=> $data['phone']])->orderBy('time','desc')->first();
        if($data['code'] != $res->code){
            return $this -> message('00001','验证码不一致');
        }

        if(time() - $res->time > 60){
            return $this -> message('00001','验证码过期');
        }
        unset($data['user_pwd1']);
        $data['add_time'] = time();
        $res = DB::table('user')->insert($data);
        if($res){
            return $this -> message('00000','注册成功');
        }else{
            return $this -> message('00001','注册失败');
        }
    }
    public function log(){
        return view('index.login');
    }
    public function do_login(Request $request){
        $user_name = $request -> user_name;
        if(empty($user_name)){
            echo "<script>alert('用户名不能为空');location='/index/log'</script>";
        }
        $user_pwd = $request -> user_pwd;
        if(empty($user_pwd)){
            echo "<script>alert('密码不能为空');location='/index/log'</script>";
        }
        $res = DB::table('user')->where(['user_name'=>$user_name])->first();
        if(empty($res)){
            echo "<script>alert('没有找到');location='/index/log'</script>";
        }
        if($res->user_pwd != $user_pwd){
            echo "<script>alert('密码不正确');location='/index/log'</script>";
        }
        if($res){
            session(['user_name'=>$user_name]);
            session(['user_id'=>$res->user_id]);
            echo "<script>alert('登陆成功');location='/'</script>";
        }else{
            echo "<script>alert('失败');location='/index/log'</script>";
        }
    }
    public function sendcode(Request $request){
        $phone = $request -> phone;
        if(empty($phone)){
            return $this->message('00001' , '手机号不能为空');
        }
        $where = [
           ['phone' , '=' , $phone],
            ['time' , '>=',time()-60]
        ];
        if(DB::table('code')->where($where)->count()>0){
            return $this -> message('00001','发送频繁');
        }
        $code = $this -> code($phone);
        if($code){
            return $this -> message('00001','发送成功');
        }else{
            return $this -> message('00002','发送失败');
        }
    }
    public function code($phone){
        $host = "http://yzxyzm.market.alicloudapi.com";
        $path = "/yzx/verifySms";
        $method = "POST";
        $appcode = env('P_APP_CODE');
        $headers = array();
        $code = rand(00000,99999);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "phone=$phone&templateId=TP18040314&variable=code:".$code;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
//        var_dump(curl_exec($curl));
//        $res = curl_exec($curl);
//        $response = json_decode($res,true);
        $response = [
            'return_code'   => 00000
        ];
        if($response['return_code']==00000){
            $data = [
                'phone'     => $phone,
                'code'      => $code,
                'time'   => time()
            ];
            $res =  DB::table('code')->insert($data);
            if($res){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function message($code , $msg , $data=[]){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
    public function del_session(){
        echo 11;
    }
    public function test()
    {
        echo session('user_id');
        echo session('user_name');
    }
}
