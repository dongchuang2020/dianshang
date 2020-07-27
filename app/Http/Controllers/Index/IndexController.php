<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
use App\Models\BrandModel;

use App\Models\Slogan;


>>>>>>> 98880544666f3b94dd204a6fde9d333683ec65e1
class IndexController extends Controller
{

    public function index(){
<<<<<<< HEAD
        $goods_info = DB::table('goods')->leftjoin('shop_category','goods.cate_id','=','shop_category.cate_id')->get();

        return view('index.index',['goods_info'=>$goods_info]);
=======

        $brand_res=BrandModel::get();
        $sloganInfo=Slogan::where(["is_del"=>2])->get();
        return view('index.index',['brand_res'=>$brand_res,"sloganInfo"=>$sloganInfo]);
>>>>>>> 98880544666f3b94dd204a6fde9d333683ec65e1
    }
}
