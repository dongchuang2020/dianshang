<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\CateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BrandModel;
use App\Model\GoodsModel;
use App\Models\Slogan;
use App\Models\ShopHistory;
class IndexController extends Controller
{
    public function index(Request $request){
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
        if($cate_info==""){
            header('Location: http://www.1909.com/');
        }
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        // dd($cate_info);
        //查询所有数据
        $cate_show = CateModel::get();
        if($cate_show==""){
            header('Location: http://www.1909.com/');
        }
        //  dd($goods_info);
        $brand_res=BrandModel::limit(16)->get();
        $b_res=BrandModel::limit(10)->get();
        $g_res=GoodsModel::orderBy('goods_click','desc')->limit(3)->get();
//        dd($brand_res);exit;
        $sloganInfo=Slogan::where(["is_del"=>2])->get();
        //我的收藏
        $collect_info = DB::table('collect')->join('goods','goods.goods_id','=','collect.goods_id')->get();
        //今日推荐
        $whereinfo = [
            'is_hot'    => 1,
            'is_del'    => 1
        ];
        $goodsInfo = DB::table('goods')->where($whereinfo)->orderby('add_time','desc')->limit(4)->get()->toArray();
        //浏览历史的展示

        $historyShow=ShopHistory::leftjoin("goods","shop_history.goods_id","=","goods.goods_id")->orderby('shop_history.add_time','desc')->limit(6)->get();


        //购物车
        $cartwhere = [
            'shop_car.user_id'   => session('user_id'),
            'shop_car.ls_del'    => 1
        ];
        //return session('user_id');
        $cart_info = DB::table('shop_car')->join('goods','goods.goods_id','=','shop_car.goods_id')->where($cartwhere)->get();
        //dd($cart_info);
        $cart_count = DB::table('shop_car')->where($cartwhere)->count();
        //dd($cart_info);
        return view('index.index',['cate_dt'=>$cate_dt,'cate_info'=>$cate_info,'cate_show'=>$cate_show,'brand_res'=>$brand_res,"sloganInfo"=>$sloganInfo,'goods_info'=>$goods_info,"sloganInfo2"=>$sloganInfo2,'g_res'=>$g_res,'b_res'=>$b_res,'collect_info'=>$collect_info,'goodsinfo'=>$goodsInfo,'historyShow'=>$historyShow,'cart_info'=>$cart_info,'cart_count'=>$cart_count]);
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
           // setcookie('user_i',$res->user_id);
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
        $res = curl_exec($curl);
        $response = json_decode($res,true);
//        $response = [
//            'return_code'   => 00000
//        ];
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
    
    public function del_session(Request $request){
        $request->session()->flush();
//        session('user_id',null);
        return redirect('/');
    }
    public function test()
    {
        echo cookie('user_id');
        echo session('user_name');
    }
    /**
     * 搜索
     */
    public function search(Request $request){
        $goods_name=$request->post('goods_name');
        $where=[];
        if($goods_name){
            $where[]=['goods_name','like',"%$goods_name%"];
        }
        $where1=[];
        if($goods_name){
            $where1[]=['brand_name','=',$goods_name];
        }
        $where2=[];
        if($goods_name){
            $where2[]=['cate_name','=',$goods_name];
        }
        $cate_res=CateModel::where($where2)->first();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        //dd($cate_res);
        if($cate_res) {
            $data = [];
            $goods_res=GoodsModel::where('cate_id',$cate_res['cate_id'])->get();
            foreach($goods_res as $v){
                $data[]=$v;
            }
            $cate_da = CateModel::where('parent_id', $cate_res['cate_id'])->get();
            if ($cate_da) {
                foreach ($cate_da as $v){
                    $goods_res = GoodsModel::where('cate_id', $v->cate_id)->get();
                    foreach($goods_res as $vv) {
                        $data[] = $vv;
                    }
            }
        }

            return view('index.search.search',['cate_dt'=>$cate_dt,'goods_res'=>$data]);
        }
        #品牌
        $brand_res=BrandModel::where($where1)->first();
       //dd($brand_res);exit;
        if($brand_res){
            $goods_res=GoodsModel::where('brand_id',$brand_res['brand_id'])->get();
            return view('index.search.search',['cate_dt'=>$cate_dt,'goods_res'=>$goods_res]);
        }
        #商品
       $goods_res=GoodsModel::where($where)->get();
//       dd($goods_res);exit;
       return view('index.search.search',['cate_dt'=>$cate_dt,'goods_res'=>$goods_res]);
    }
    public function sloganinfo($id){
        $res=Slogan::where("slogan_id",$id)->first();
        $cate_dt = CateModel::where('cate_nav_show',1)->get();
        $historyShow=ShopHistory::leftjoin("goods","shop_history.goods_id","=","goods.goods_id")->orderby('shop_history.add_time','desc')->limit(6)->get();
        return view("index.sloganinfo",["res"=>$res,"historyShow"=>$historyShow,"cate_dt"=>$cate_dt]);
    }
}
