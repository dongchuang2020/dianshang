<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //商品添加页面
    public function goodsadd(){
        $brand_info = DB::table('shop_brand')->get();
        $sku_name = DB::table('sku_name')->get();
        $cate_info = DB::table('shop_category')->get();
        $attr_info = DB::table('attribute')->get();
        return view('admin.goods.add',['brand_info'=>$brand_info,'sku_name'=>$sku_name,'cate_info'=>$cate_info,'attr_info'=>$attr_info]);
    }
    //执行商品添加
    public function do_goodsadd(Request $request){
        $data = [];
        $data = $request -> all();
        //检测文件上传
        $fileinfo=$_FILES["goods_log"];
        //dd($fileinfo);
        if ($fileinfo['error'] == 4){
            echo "<script>alert('没有文件上传');location='/admins/goods'</script>";
        }
        $goods_log = $this -> checkimg($fileinfo);
        $data['goods_log'] = $goods_log;
        $data['add_time'] = time();
        $res = GoodsModel::insert($data);
        if($res){
            echo "<script>alert('添加成功');location='/admins/goodslist'</script>";
        }else{
            echo "<script>alert('添加成功');location='/admins/goods'</script>";
        }
    }
    //商品列表
    public function goodslist(Request $request){
        //接受商品名称值
        $goods_name=$request->post("goods_name");
        $brand_id=$request->post("brand_id");
        $cate_id=$request->post("cate_id");
        $where2=[];
        if(!empty($goods_name)){
           $where2[]=['goods_name','like','%'.$goods_name.'%'];
        }
        if(!empty($brand_id)){
            $where2[]=['shop_brand.brand_id',"=",$brand_id];
        }
        if(!empty($cate_id)){
            $where2[]=['shop_category.cate_id',"=",$cate_id];
        }
        $name = [
            'goods_name'=>$goods_name,
            'brand_id'=>$brand_id,
            'cate_id'=>$cate_id
        ];

        $brand_info = DB::table('shop_brand')->get();
        $cate_info = DB::table('shop_category')->get();
        $where = [
            'sku_name.is_del'    => 1,
            'goods.is_del'  =>1
        ];

        $res = GoodsModel::
            leftjoin("shop_brand","goods.brand_id","=","shop_brand.brand_id")
            ->leftjoin("sku_name","goods.sid","=","sku_name.sid")
            ->leftjoin("attribute","goods.a_id","=","attribute.a_id")
            ->leftjoin('shop_category',"goods.cate_id","=","shop_category.cate_id")
            ->where($where)
            ->where($where2)
            ->paginate(2);
//        var_dump($res);die;


        return view('admin.goods.list',['data'=>$res,"brand_info"=>$brand_info,"cate_info"=>$cate_info,'name'=>$name]);

    }
    //商品删除
    public function delgoods(Request $request){
        $goods_id = $request -> goods_id;
        $where = [
            'goods_id'  => $goods_id
        ];
        $res = GoodsModel::where($where)->update(['is_del'=>2]);
        if($res){
            return $this->message('00001','成功');
        }else{
            return $this->message('00002','失败');
        }
    }
    //商品修改
    public function upgoods($id ){
        $where = [
            'goods_id'  => $id
        ];
        $brand_info = DB::table('shop_brand')->get();
        $sku_name = DB::table('sku_name')->get();
        $cate_info = DB::table('shop_category')->get();
        $attr_info = DB::table('attribute')->get();
        $res = GoodsModel::where($where)->first();
        return view('admin.goods.upgoods',['data'=>$res,'brand_info'=>$brand_info,'sku_name'=>$sku_name,'cate_info'=>$cate_info,'attr_info'=>$attr_info]);
    }
    //执行修改
    public function do_upgoods( Request $request ){
        $data = [];
        $data = $request -> all();
        $fileinfo=$_FILES["goods_log"];
        if($fileinfo['error'] != 4){
            $goods_log = $this -> checkimg($fileinfo);
            $data['goods_log'] = $goods_log;
        }
        $data['add_time'] = time();
        $where = [
            'goods_id'  => $data['goods_id']
        ];

        $res = GoodsModel::where($where)->update($data);
        if($res){
            echo "<script>alert('修改成功');location='/admins/goodslist'</script>";
        }else{
            echo "<script>alert('修改成功');location='/admins/goodslist'</script>";
        }
    }
    //检测文件上传
    public function checkimg($fileinfo){


        $tmp_name=$fileinfo["tmp_name"];//上传文件临时名字
        $ext=explode(".",$fileinfo["name"])[1];//文件扩展名

        $newFileName=md5(uniqid()).".".$ext;
        $newFilePath="./uploads/".Date("Y/m/d/",time());
        if(!is_dir($newFilePath)){
            mkdir($newFilePath,777,true);
        }
        $newFilePath=$newFilePath.$newFileName;
        move_uploaded_file($tmp_name,$newFilePath);
        $newFilePath=ltrim($newFilePath,".");
        return $newFilePath;
    }
    public function message($code , $msg , $data = []){
        return [
            'code'  => $code,
            'msg'   => $msg,
            'data'  => $data
        ];
    }
    //商品名称的即点即改
    public function chang_goodsname(Request $request){
        $goods_id=$request->post("goods_id");
        $field=$request->post("field");
        $val=$request->post("val");
        $chang_val=GoodsModel::where("goods_id",$goods_id)->update([$field=>$val]);
        if($chang_val!==false){
            return [
                "code"=>200,
                "msg"=>"修改成功",
                "url"=>"/admins/goodslist"
            ];
        }else{
            return [
                "code"=>100,
                "msg"=>"修改失败",
                "url"=>"/admins/goodslist"
            ];
        }
    }
    //商品是否显示的即点即改
    public function chang_show(Request $request){
        $goods_id=$request->post("goods_id");
        $field=$request->post("field");
        $val=$request->post("val");
        $chang_show=GoodsModel::where("goods_id",$goods_id)->update([$field=>$val]);
        if($chang_show!==false){
            return [
                "code"=>200,
                "msg"=>"修改成功",
                "url"=>"/admins/goodslist"
            ];
        }else{
            return [
                "code"=>200,
                "msg"=>"修改成功",
                "url"=>"/admins/goodslist"
            ];
        }
    }
}
