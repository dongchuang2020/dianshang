<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use App\Models\CategoryModel;

class BrandController extends Controller
{
    public function index(){
        $res=BrandModel::leftjoin('shop_category','shop_brand.cate_id','=','shop_category.cate_id')->paginate(3);
        $re=CategoryModel::get();
        $ca_info =CategoryModel::where('parent_id','=',0)->get();
//        dd($ca_info);exit;
        return view('admin.brand.index',['res'=>$res,'re'=>$re,'ca_info'=>$ca_info]);
    }
    public function add_do(Request $request){
        $brand_name=$request->post('brand_name');
        $cate_id=$request->post('cate_id');
        $fileinfo=$_FILES["brand_img"];
        //dd($fileinfo);
        if ($fileinfo['error'] == 4){
            echo "<script>alert('没有文件上传');location='/brand/index'</script>";
        }
        $brand_img = $this -> checkimg($fileinfo);
        $brand_show=$request->post('brand_show');
        $data=[
            'brand_name'=>$brand_name,
            'cate_id'=>$cate_id,
            'brand_img'=>$brand_img,
            'brand_show'=>$brand_show,
            'add_time'=>time(),
        ];
        $res=BrandModel::insert($data);
        if($res){
            return redirect('/brand/index');
        }
    }
    public  function del($id){
        $res=BrandModel::destroy($id);
//        var_dump($res);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'删除成功',
                'url'=>'/brand/index'
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
        $re=CategoryModel::get();
        $res=BrandModel::where('brand_id',$id)->first();
        return view('admin.brand.edit',['res'=>$res,'re'=>$re]);
    }
    public function update(Request $request){
        $brand_id=$request->post('brand_id');
        $brand_name=$request->post('brand_name');
        $cate_id=$request->post('cate_id');
        $fileinfo=$_FILES["brand_img"];
        //dd($fileinfo);
        if ($fileinfo['error'] == 4){
            echo "<script>alert('没有文件上传');location='/brand/index'</script>";
        }
        $brand_img = $this -> checkimg($fileinfo);
        $brand_show=$request->post('brand_show');
        $data=[
            'brand_id'=>$brand_id,
            'brand_name'=>$brand_name,
            'cate_id'=>$cate_id,
            'brand_img'=>$brand_img,
            'brand_show'=>$brand_show
        ];
        $res=BrandModel::where('brand_id',$brand_id)->update($data);
        if($res!==false){
            return redirect('/brand/index');
        }
    }
    /**
     * 是否即点即该
     */
    public function change(Request $request){
        $brand_id=$request->post('brand_id');
        $field=$request->post('field');
        $value=$request->post('_value');
        $res=BrandModel::where('brand_id',$brand_id)->update([$field=>$value]);
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'修改成功',
                'url'=>'/brand/index'
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
    /**
     * 品牌名称即点即该
     */
    public function changeName(Request $request){
        $value=$request->post('_value');
        $field=$request->post('field');
        $brand_id=$request->post('brand_id');
        $res=BrandModel::where('brand_id',$brand_id)->update([$field=>$value]);
//        var_dump($res);exit;
        if($res){
            $msg=[
                'status'=>'200',
                'message'=>'修改成功',
                'url'=>'/brand/index'
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
    /**
     * @param $filename
     * @return false|string
     * 文件上传
     */
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
}
