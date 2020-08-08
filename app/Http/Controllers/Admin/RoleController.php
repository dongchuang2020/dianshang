<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\ChmodModel;
use App\Models\RoleChmodModel;

class RoleController extends Controller
{
    public function show(Request $request){
    	$roleInfo=Role::paginate(2);
    	$res=ChmodModel::leftjoin('role_chmod','chmod.chmod_id','=','role_chmod.chmod_id')->get();
    	// var_dump($res);exit;
    	return view("admin.role.show",["roleInfo"=>$roleInfo,'res'=>$res]);
    }
    public function doadd(Request $request){
    	$data=$request->all();
    	$res=Role::insert($data);
    	if($res){
    		return redirect("role/show");
    	}
    }
    public function del(Request $request){
    	$role_id=$request->post("role_id");
    	$where=[
    		["role_id","=",$role_id]
    	];
    	$res=Role::where($where)->delete();
    	if($res){
    		$info=1;
    	}else{
    		$info=2;
    	}
		return $info;
    }
    public function update($id){
    	$res=Role::where('role_id',$id)->first();
    	return view("admin.role.update",["res"=>$res]);
    }
    public function updatedo(Request $request){
    	$data=$request->all();
    	// var_dump($data);exit;
    	$role_id=$request->post("role_id");
    	$where=[
    		["role_id","=",$role_id]
    	];
    	$res=Role::where($where)->update($data);
    	// var_dump($res);exit;
    	if($res!==false){
    		return redirect("role/show");
    	}
    } 	
    public function rolechmod_add($id){
    	$res=ChmodModel::get();
    	return view("admin.role.chmod",['res'=>$res,'role_id'=>$id]);
    }
    public function rolechmod_add_do(request $request){
    	$chmod_id=$request->post('chmod_id');
    	// dd($chmod_id);exit;
    	$role_id=$request->post('role_id');
    	// var_dump($role_id);exit;
    	$chmod_id=explode(',',$chmod_id);
    	// dd($chmod_id);exit;
    	foreach($chmod_id as $k=>$v){
    		// var_dump($v);
    		$data=[
    			'chmod_id'=>$v,
    			'role_id'=>$role_id
    		];
    		$res=RoleChmodModel::insert($data);
    	}
    	if($res){
    		$info=1;
    	}else{
    		$info=2;
    	}
    	return $info;
    }

}
