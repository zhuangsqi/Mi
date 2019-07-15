<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use app\Http\Requests\UsersInsertRequest;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        //列表
        $data = DB::table('admin_users')->get();
       
        
        return view("Admin.Adminusers.index",['data'=>$data]);
    }

    //分配角色
    public  function role($id){
        // echo $id;
        //获取当前管理员的信息
        $adminuser=DB::table("admin_users")->where("id","=",$id)->first();
        //获取所有的角色信息
        $role=DB::table("role")->get();
        //获取当前管理员的角色
        $rid=DB::table("user_role")->where("uid","=",$id)->get();
        // dd($rid);
        $rids=array();
        if(count($rid)){
            //遍历
            foreach($rid as $key=>$value){
                //$rids 数组主要存放的是角色ID
                $rids[]=$value->rid;
            }
            // dd($rids);
             //加载模板
                return view("Admin.Adminusers.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>$rids]);
        }else{
            //直接加载模板
                return view("Admin.Adminusers.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>array()]);

        } 
    }
    //保存角色
    public function saverole(Request $request){

        $uid = $request->input("uid");
 
        $rids = $_POST['rids'];
        DB::table("user_role")->where("uid","=",$uid)->delete();
        foreach($rids as $key=>$value){
            $data['uid'] = $uid;
            $data['rid'] = $value;
            DB::table("user_role")->insert($data);

        }
        return redirect("/adminusers")->with("success","角色分配成功");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Adminusers.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //执行添加
       $data = $request->except('_token');
       //密码加密
       $data['password'] = Hash::make($data['password']);
       dd($data);
       //执行添加入库
       if(DB::table("admin_users")->insert($data)){
        echo "ok";
       }
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
