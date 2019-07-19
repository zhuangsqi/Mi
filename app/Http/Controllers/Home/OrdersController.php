<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //结算页面
    public function jesuan(Request $request){

    }

    //加载页面
    public function insert(){
    	return view('Home.Orders.index');
    }
}
