<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AreaModel;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function area(){
        $where = [
            'pid'   => 0
        ];
        $res = AreaModel::where($where)->get()->toArray();
        return view('admin.area.list',['data'=>$res]);
    }
    public function city(Request $request){
        $id = $request -> id;
        $where = ['pid'    => $id];
        $res = AreaModel::where($where)->get();
        echo  json_encode($res,JSON_UNESCAPED_UNICODE);
    }
    public function getarea(Request $request){
        $id = $request -> id;
        $where = ['pid'    => $id];
        $res = AreaModel::where($where)->get();
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }
}
