<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart=session('cart');
        $data1=array();
        if(count($cart)){
            foreach($cart as $key=>$value){
                $info=DB::table('admin_product')->where('id','=',$value['id'])->first();
                $data['id']=$value['id'];
                $data['num']=$value['num'];
                $data['name']=$info->name;
                $data['goods']=$info->goods;
                $data['logo']=$info->logo;
                $data['money']=$info->money;
                $data1[]=$data;
            } 
        }
        
        return view('Home.Cart.cart',['data1'=>$data1]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //购物车去重
    public function checkexists($id){
        $shop=session('cart');
        //购物车没有数据
        if(empty($shop)) return false;
        foreach($shop as $key=>$value){
            if($value['id']==$id){
                return true;
            }
        }
    }

    public function store(Request $request)
    {
        $data=$request->except('_token');
        //去重
        if(!$this->checkexists($data['id'])){
            $request->session()->push('cart',$data);
        }
        return redirect('/cart');
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
        //echo $id;
        $cart=session('cart');
        foreach($cart as $key=>$value){
            if($value['id']==$id){
                unset($cart[$key]);
            }
        }

        session(['cart'=>$cart]);
        return redirect('/cart');
    }

    public function alldelcart(Request $request){
        $request->session()->pull('cart');
        return redirect('/cart');
    }


    //购物车商品减
    public function cartupdatee(Request $request){
        $id=$request->input('id');
        $info=DB::table('admin_product')->where('id','=',$id)->first();
        $cart=session('cart');
        foreach($cart as $key=>$value){
            if($value['id']==$id){
                $cart[$key]['num']-=1;
                if( $cart[$key]['num']<=1){
                    $cart[$key]['num']=1;
                }
                session(['cart'=>$cart]);
                $data['num']=$cart[$key]['num'];
                $data['tot']=$cart[$key]['num']*$info->money;
                echo json_encode($data);
            }
        }
    }

    //购物车商品加
    public function cartadd(Request $request){
        $id=$request->input('id');
        $info=DB::table('admin_product')->where('id','=',$id)->first();
        $cart=session('cart');
        foreach($cart as $key=>$value){
            if($value['id']==$id){
                $cart[$key]['num']+=1;
                if( $cart[$key]['num']>=$info->amount){
                    $cart[$key]['num']=$info->amount;
                }
                session(['cart'=>$cart]);
                $data['num']=$cart[$key]['num'];
                $data['tot']=$cart[$key]['num']*$info->money;
                echo json_encode($data);
            }
        }
    }

    //购物车总金额和总商品数量
    public function carttot(){
        
        if(isset($_GET['arr'])){
            //商品总数
            $nums=0;
            //购物车总价
            $sum=0;
            //echo json_encode($arr);
            foreach($_GET['arr'] as $key1=>$value1){
                //遍历购物车信息
                $cart=session('cart');
                foreach($cart as $key=>$value){
                    if($value1==$value['id']){
                        $num=$cart[$key]['num'];
                        //数据库中获取商品信息
                        $info=DB::table('admin_product')->where('id','=',$value1)->first();
                        $tot=$num*$info->money;
                        $nums+=$num;
                        $sum+=$tot;
                    }
                }
            }
            $data['nums']=$nums;
            $data['sum']=$sum;
            echo json_encode($data);
        }else{
            $data['nums']=0;
            $data['sum']=0;
            echo json_encode($data);
        }
    }
}
