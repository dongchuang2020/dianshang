<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AreaModel;
use DB;

class AddressController extends Controller
{
    public function address(Request $request){
    	$areaInfo=AreaModel::where(["pid"=>0])->get();
    	$areaShow=DB::table("user_ress")->get();
    	// dd($areaShow);
    	foreach($areaShow as $k=>$v){
    		$province=DB::table("shop_area")->where(["id"=>$v->province])->first();
    		$city=DB::table("shop_area")->where(["id"=>$v->city])->first();
    		$area=DB::table("shop_area")->where(["id"=>$v->area])->first();
    		$v->obj=$province->name.$city->name.$area->name;
    	}
    	return view("index.address",["areaInfo"=>$areaInfo,"areaShow"=>$areaShow]);
    }
    public function getcity(Request $request){
    	$id=$request->post("id");
    	$where = ['pid'    => $id];
    	$res=AreaModel::where($where)->get();
    	echo  json_encode($res,JSON_UNESCAPED_UNICODE);
    }
    public function getarea(Request $request){
    	$id=$request->post("id");
    	$where = ["pid"=>$id];
    	$res=AreaModel::where($where)->get();
    	echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }
    public function addressDo(Request $request){
    	$data=$request->post();
    	// dd($data);
    	$res=DB::table("user_ress")->insert($data);
    	if($res){
    		return redirect("/address");
    	}
    }
   	public function addressDel(Request $request){
   		$ress_id=$request->post("ress_id");
   		$res=DB::table("user_ress")->where(["ress_id"=>$ress_id])->delete();
        if($res){
            return [
                "success"=>"true",
                "code"=>"200",
                "url"=>"/address"
            ];
        }else{
            return [
                "success"=>"false",
                "code"=>"100",
                "url"=>"/address"
            ];
        }
   	}
    public function addressUpdate($id){
        $where=[
            ["ress_id","=",$id]
        ];
        $areaInfo=AreaModel::where(["pid"=>0])->get();
        $res=DB::table("user_ress")->where($where)->first();
        return view("index.addressUpdate",["res"=>$res,"areaInfo"=>$areaInfo]);
    }
    public function addressUpdatedo(Request $request){
        $data=$request->all();  
        if($data['province']==""){
            unset($data["province"]);
        }
        if($data['city']==""){
            unset($data["city"]);
        }
        if($data['area']==""){
            unset($data["area"]);
        }
        unset($data["ress_id"]);
         // dd($data);
        $ress_id=$request->post("ress_id");
        $where=[
            ["ress_id","=",$ress_id]
        ];
        $res=DB::table("user_ress")->where($where)->update($data);
        if($res!==false){
            return redirect("/address");
        }
    }
    public function addressChange(Request $request){
        $is_default=$request->post('is_default');//默认
        $ress_id=$request->post('ress_id');//id
        if($is_default==1){
            $where=[
                ['ress_id','!=',$ress_id]
            ];
            DB::table('user_ress')->where($where)->update(['is_default'=>2]);
        }

        $res=DB::table('user_ress')->where(['ress_id'=>$ress_id])->update(['is_default'=>$is_default]);
        if($res){
            return [
                "success"=>"true",
                "code"=>"200",
                "url"=>"/address"
            ];
        }else{
            return [
                "success"=>"false",
                "code"=>"100",
                "url"=>"/address"
            ];
        }
        
        
    }

}
