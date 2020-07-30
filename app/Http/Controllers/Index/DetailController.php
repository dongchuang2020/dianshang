<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;
class DetailController extends Controller
{
    public function index($id){
        $res=GoodsModel::where('goods_id',$id)->first();
        $user_id= session('user_id');
        $collect_where = [
            'goods_id'  => $id,
            'user_id'   => $user_id,
            'is_del'    => 1
        ];
        $collect_info = DB::table('collect')->where($collect_where)->first();
        return view('Index.details.index',['res'=>$res,'info'=>$collect_info]);
    }
}
