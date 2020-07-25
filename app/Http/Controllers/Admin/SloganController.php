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
         //检测文件上传
        $fileinfo=$_FILES["slogan_img"];
        //dd($fileinfo);
        if ($fileinfo['error'] == 4){
            echo "<script>alert('没有文件上传');location='/slogan/show'</script>";
        }
         $slogan_img = $this -> checkimg($fileinfo);
         $data['slogan_img'] = $slogan_img;  
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
      $fileinfo=$_FILES["slogan_img"];
        if($fileinfo['error'] != 4){
            $slogan_img = $this -> checkimg($fileinfo);
            $data['slogan_img'] = $slogan_img;
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
}
