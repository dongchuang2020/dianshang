<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slogan;
use App\Models\BrandModel;


class IndexController extends Controller
{
    //
    public function index(){
    	$sloganInfo=Slogan::where(["is_del"=>2])->get();
    	$sloganInfo2=Slogan::where(["is_del"=>2])->limit(1)->get();
        return view('index.index',["sloganInfo"=>$sloganInfo,"sloganInfo2"=>$sloganInfo2]);
    }
}
