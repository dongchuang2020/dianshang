<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderadd($id){
    	$user_id=session("user_id");
    	// dd($user_id);
    }
}
