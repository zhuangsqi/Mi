<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Orders;
class OrdersController extends Controller
{
    //结算页面
    public function jiesuan(Request $request){
    	$arr=$_GET['arr'];
    	foreach ($arr as $key => $value) {
    		$cart=session('cart');
    		foreach ($cart as $k => $v) {
    			if($value==$v['id']){
    				$data[$k]['num']=$cart[$k]['num'];
    				$data[$k]['id']=$value;
    			}
    		}
    	}
    	$request->session()->push('goodss',$data);
    	echo json_encode($data);
    }

    //加载页面
    public function insert(){
    	$goodss=session('goodss');
    	$tot="";
    	$d=[];
    	$nums=0;
    	foreach ($goodss[0] as $key => $value) {
    		$info=DB::table('admin_product')->where('id','=',$value['id'])->first();
    		$temp['num']=$value['num'];
    		$temp['logo']=$info->logo;
    		$temp['name']=$info->name;
    		$temp['money']=$info->money;
    		$tot+=$temp['num']*$info->money;
    		$d[]=$temp;
    		$nums+=$temp['num'];
    	}

    	$id=session('info')->id;


    	//获取当前登录用户的收货地址
    	$address=DB::table('user_address')->where('u_id','=',$id)->orderBy('id','asc')->get();
    	$addresss=DB::table('user_address')->where('u_id','=',$id)->first();
    	return view('Home.Orders.index',['address'=>$address,'addresss'=>$addresss,'d'=>$d,'tot'=>$tot,'nums'=>$nums]);
    }



    //添加收货地址
    public function tianjia()
    {
        $id=session('info')->id;
        $data=DB::table('adminuser')->where('id','=',$id)->first();
        return view('Home.Orders.add_address',['data'=>$data]);
    }

    public function district(Request $request){
        $id = $request->input('upid');
        $data=DB::table('district')->where('upid','=',$id)->get();
        echo $data;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dotianjia(Request $request)
    {
        $info=$request->except('_token');
        $info['createtime']=date('Y-m-d H:i:s',time());
        if(DB::table('user_address')->insert($info)){
            return redirect('/insert')->with('success','添加成功');
        }else{
            return  back()->with('error','添加失败');
        }
    }


    //选择收货地址
    public function choose(Request $request){

    	$address_id=$request->input('address_id');
    	$data=DB::table('user_address')->where('id','=',$address_id)->first();
    	echo json_encode($data);
    }

    //下单
    public function create(Request $request){
    	if(empty($request->input('address_id'))){
    		return back()->with('error','请选择收货地址!');
    	}
    	//向订单表插入数据
    	$data['address_id']=$request->input('address_id');
    	$data['order_num']=time();
        $data['user_id']=session('info')->id;
        $data['status']="1";//1 未支付
        $id=DB::table("orders")->insertGetId($data);
        if($id){
            //获取购买的session数据
            $goodss=session('goodss');
            $tot="";
            //遍历
            foreach($goodss[0] as $key=>$value){
                //获取商品信息
                $info=DB::table("admin_product")->where("id","=",$value['id'])->first();
                $tem['num']=$value['num'];
                $tem['shop_id']=$value['id'];
                $tem['order_id']=$id;
                $tem['pic']=$info->logo;
                $tem['name']=$info->name;
                $tot+=$tem['num']*$info->money;
                $d[]=$tem;
            }
            //向商品详情表orders_goods 插入数据
            if(DB::table("orders_goods")->insert($d)){
                session(['tot'=>$tot]);
                session(['address_id'=>$data['address_id']]);
                session(['order_id'=>$id]);
                pays($data['order_num'],"shangpin",'0.01',"shangpin");
            }
        }
    }

    //结算后跳转页面
    public function returnurl(){
    	//把订单状态由未付款变为已付款
        $order_id=session("order_id");
        $tot=session("tot");
        //获取收货地址
        $address_id=session("address_id");
        $address=DB::table("user_address")->where("id","=",$address_id)->first();
        //修改订单状态
        $data['status']="2";
        DB::table("orders")->where("id","=",$order_id)->update($data);
    	return view('Home.Orders.success',['tot'=>$tot,'address'=>$address,'order_id'=>$order_id]);
    }

    //我的订单(所有)
    public function myorder(Request $request){
        $id=session('info')->id;
        $order=Orders::where('user_id','=',$id)->get();
        foreach ($order as $key => $value) {
            $shop=DB::table('orders_goods')->where('order_id','=',$value->id)->get();
            foreach ($shop as $key) {
                $arr=DB::table('admin_product')->where('id','=',$key->shop_id)->first();
                $arrs['id']=$arr->id;
                $arrs['name']=$arr->name;
                $arrs['money']=$arr->money;
                $arrs['logo']=$arr->logo;
                $arrs['num']=$key->num;  
                $arrs['order_id']=$key->order_id;  
            }
            $arrs['order_num']=$value->order_num;
            $arrs['status']=$value->status;
            $aa[]=$arrs;
        }
        
        return view('Home.Orders.myorder',['aa'=>$aa]);
    }

    //订单详情
    public function orderdetail(Request $request){
        $order_id=$_GET['order_id'];
        $order=Orders::where('id','=',$order_id)->first();
        //获取状态值
        $orders=DB::table('orders')->where('id','=',$order_id)->first();
        $status=$orders->status;
        //获取订单商品
        $shop=DB::table('orders_goods')->where('order_id','=',$order_id)->get();
        $tot="";
        foreach ($shop as $key) {
            $arr=DB::table('admin_product')->where('id','=',$key->shop_id)->first();
            $arrs['id']=$arr->id;
            $arrs['name']=$arr->name;
            $arrs['money']=$arr->money;
            $arrs['logo']=$arr->logo;
            $arrs['num']=$key->num;
            $tot+=$arr->money*$key->num;
            $aa[]=$arrs;
        }

        $address=DB::table('user_address')->where('id','=',$order->address_id)->first();
        return view('Home.Orders.orderdetail',['order'=>$order,'address'=>$address,'status'=>$status,'aa'=>$aa,'tot'=>$tot]);
    }

    //确认收货
    public function receipt(Request $request){
        $id=$request->id;
        
        $info=DB::table('orders')->where('id','=',$id)->first();
        $data['status']=4;
        if($info->status < 3){
            echo 1;
        }else{
            if(DB::table('orders')->where('id','=',$id)->update($data)){
                echo 2;
            }else{
                echo 3;
            }
        }

    }
}
