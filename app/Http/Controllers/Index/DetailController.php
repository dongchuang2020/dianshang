<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;

class DetailController extends Controller
{
    public function index($id){
        $res=GoodsModel::where('goods_id',$id)->first();
//        dd($res);exit;
        return view('Index.details.index',['res'=>$res]);
    }
}
