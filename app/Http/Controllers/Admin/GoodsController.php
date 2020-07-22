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
        return view('admin.goods.add');
    }
    //执行商品添加
    public function do_goodsadd(Request $request){
        $data = [];
        $data = $request -> all();
        //检测文件上传
        $fileinfo=$_FILES["goods_log"];
        $goods_log = $this -> checkimg($fileinfo);
        $data['goods_log'] = $goods_log;
        $data['add_time'] = time();
        $res = GoodsModel::insert($data);
        if($res){
            echo "<script>alert('添加成功');location='/admin/goodslist'</script>";
        }else{
            echo "<script>alert('添加成功');location='/admin/goods'</script>";
        }
    }
    //商品列表
    public function goodslist(){
        $where = [
            'is_del'    => 1,
        ];
        $res = GoodsModel::where($where)->paginate(2);
        return view('admin.goods.list',['data'=>$res]);
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
        $res = GoodsModel::where($where)->first();

        return view('admin.goods.upgoods',['data'=>$res]);
    }
    //执行修改
    public function do_upgoods( Request $request ){
        $data = [];
//        $goods_id = $request ->post("goods_id");
        $data = $request -> all();
        $fileinfo=$_FILES["goods_log"];
        $goods_log = $this -> checkimg($fileinfo);
        $data['goods_log'] = $goods_log;
        $data['add_time'] = time();
        $where = [
            'goods_id'  => $data['goods_id']
        ];

        $res = GoodsModel::where($where)->update($data);
        if($res){
            echo "<script>alert('修改成功');location='/admin/goodslist'</script>";
        }else{
            echo "<script>alert('修改成功');location='/admin/goodslist'</script>";
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
}
