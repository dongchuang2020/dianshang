<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;


class IndexController extends Controller
{
    //
    public function index(){
        $brand_res=BrandModel::get();
        return view('index.index',['brand_res'=>$brand_res]);
    }
}
