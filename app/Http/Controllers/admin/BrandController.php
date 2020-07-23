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
        return view('admin.brand.index',['res'=>$res,'re'=>$re]);
    }
    public function add_do(Request $request){
        $brand_name=$request->post('brand_name');
        $cate_id=$request->post('cate_id');
        if($request->hasFile('brand_img')){
            $brand_img=$this->upload('brand_img');
        }
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
        if($request->hasFile('brand_img')){
            $brand_img=$this->upload('brand_img');
        }
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
    public function upload($filename){
        if(request()->file($filename)->isValid()){
            $photo=request()->file($filename);
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }
}
