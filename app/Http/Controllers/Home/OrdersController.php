<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
    	return view('Home.Orders.success',['tot'=>$tot,'address'=>$address]);
    }
}
