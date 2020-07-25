<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;

use App\Models\Slogan;


class IndexController extends Controller
{

    public function index(){

        $brand_res=BrandModel::get();
        $sloganInfo=Slogan::where(["is_del"=>2])->get();
        return view('index.index',['brand_res'=>$brand_res,"sloganInfo"=>$sloganInfo]);
    }
}
