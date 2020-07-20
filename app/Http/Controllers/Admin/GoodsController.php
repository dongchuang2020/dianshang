<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    public function goodsadd(){
        return view('admin.goods.add');
    }
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
    public function goodslist(){
        $res = GoodsModel::all();
        return view('admin.goods.list',['data'=>$res]);
    }
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
