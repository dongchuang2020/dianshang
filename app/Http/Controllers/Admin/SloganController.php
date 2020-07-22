<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SloganCate;
use App\Models\Slogan;

class SloganController extends Controller
{
   public function show(Request $request){
   		$slogancate=SloganCate::get();
         $slogan=Slogan::leftjoin("slogan_cate","slogan.slogancate_id","=","slogan_cate.slogancate_id")->where(["is_del"=>2])->paginate(2);
   		return view("admin.slogan.slogan",["slogancate"=>$slogancate,"slogan"=>$slogan]);
   }
   public function doadd(Request $request){
   		$data=$request->all();
   		if($request->hasFile("slogan_img")){
   			$data["slogan_img"]=$this->upload("slogan_img");
   		}   
   		$slogan=Slogan::insert($data);
   		if($slogan){
   			return redirect("slogan/show");
   		}
   }
   
   public function del(Request $request){
      $slogan_id=$request->post("slogan_id");
      $where=[
         ["slogan_id","=",$slogan_id]
      ];
      $res=Slogan::where($where)->update(["is_del"=>1]);
      if($res){
         return [
            "success"=>"true",
            "code"=>"00000",
            "url"=>"/slogan/show"
         ];
      }else{
         return [
            "success"=>"false",
            "code"=>"00001",
            "url"=>"/slogan/show"
         ];
      }
   }
   public function update($id){
      $where=[
         ["slogan_id","=",$id]
      ];
      $slogancate=SloganCate::get();
      $res=Slogan::where($where)->first();
      return view("admin.slogan.update",["slogancate"=>$slogancate,"res"=>$res]);
   }
   public function updatedo(Request $request){
      $data=$request->all();
      if($request->hasFile("slogan_img")){
            $data["slogan_img"]=$this->upload("slogan_img");
      }   
      $slogan_id=$data["slogan_id"];
      $where=[
         ["slogan_id","=",$slogan_id]
      ];
      $res=Slogan::where($where)->update($data);
      if($res!==false){
         return redirect("slogan/show");
      }
   }
   //文件上传
   public function upload($filename){
         //判断上传过程有无错误
         if(request()->file($filename)->isValid()){
            $photo=request()->file($filename);
            $store_result=$photo->store("uploads");
            return $store_result;
         }

         exit("未获取到上传文件获取上传过程出现错误");
   }
}
