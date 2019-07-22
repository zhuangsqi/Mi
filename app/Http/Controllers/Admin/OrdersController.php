<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Orders;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //多表关联查询数据
         $data = Orders::join("adminuser","orders.user_id","=","adminuser.id")->select("adminuser.name","adminuser.phone","adminuser.id","orders.id as aid","orders.order_num","orders.status")->get();
        return view("Admin.Orders.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    //订单详情
    public function dxq(Request $request){
        //加载订单详情
        $id = $_GET['dd'];
         $orders=DB::table('orders')->where('id','=',$id)->first();
        $data = DB::table("orders")->where("id","=",$id)->first();
         $shop=DB::table('orders_goods')->where('order_id','=',$id)->get();
        $tot="";
        foreach ($shop as $key) {
            $address=DB::table('user_address')->where('id','=',$orders->address_id)->first();
            $arr=DB::table('admin_product')->where('id','=',$key->shop_id)->first();
            $arrs['id']=$arr->id;
            $arrs['name']=$arr->name;
            $arrs['money']=$arr->money;
            $arrs['phone']=$address->addressphone;
            $arrs['useraddress']=$address->useraddress;
            $arrs['logo']=$arr->logo;
            $arrs['num']=$key->num;
            $tot+=$arr->money*$key->num;
            $aa[]=$arrs;
        }
       
        return view('Admin.Orders.dxq',['aa'=>$aa,'tot'=>$tot,'address'=>$address]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
