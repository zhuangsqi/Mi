<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Mail;
use App\Models\Users;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCatesBypid($pid){
        $data = DB::table("cates")->where("pid","=",$pid)->get();
        $data1 = array();
        foreach ($data as $key=>$value){
            $value->suv = self::getCatesBypid($value->id);
            $data1[] = $value;
        }
        return $data1;
    }
    
    public function index(Request $request)
    {   
        $cate = self::getCatesBypid(0);

        $cates=DB::table('cates')->where('pid','=',0)->get();
      
        foreach($cates as $row){
            $shop[] = DB::table("admin_product")->join("cates","admin_product.cate_id","=","cates.id")->select("admin_product.id as aid","admin_product.name as aname","admin_product.logo","admin_product.cate_id","admin_product.goods","admin_product.money","admin_product.amount","admin_product.uid","cates.id as cid","cates.name as cname")->where('admin_product.cate_id','=',$row->id)->get();
        }
       
        return view('Home.Index.index',['cate'=>$cate,'shop'=>$shop]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeUserRequest $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info=DB::table('admin_product')->where('id','=',$id)->first();
       
        return view('Home.Index.info',['info'=>$info]);
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

    //退出登录
    public function uplogin(Request $request){
        $request->session()->pull('info');
        return redirect('/');
    }
}
