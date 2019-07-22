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
    public function index()
    {
        //列表
        $data = DB::table('admin_users')->get();
        return view("Admin.Adminusers.index",['data'=>$data]);
    }
    //分配角色
    public function role($id){
        //获取当前管理员的信息
        $adminuser = DB::table("admin_users")->where("id","=",$id)->first();
        //获取所有的角色信息
        $role = DB::table("role")->get();
        //获取当前管理员的角色
        $rid = DB::table("user_role")->where("uid","=",$id)->get();
        $rids = array();
        if(count($rid)){
            //遍历
            foreach($rid as $key=>$value){
                $rids[] = $value->rid;
            }
            //加载模板
            return view("Admin.Adminusers.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>$rids]);
        }else{
            //直接加载模板
            return view("Admin.Adminusers.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>array()]);
        }
    }
    //保存角色
    public function saverole(Request $request){
        //获取管理员id
        $uid = $request->input("uid");
        //获取选择的角色
        $rids = $_POST['rids'];
        //删除当前管理员已有的角色
        DB::table("user_role")->where("uid","=",$uid)->delete();
        //遍历数据
        foreach($rids as $key=>$value){
            //封装要插入的数据
            $data['uid'] = $uid;
            $data['rid'] = $value;
             //把选择角色存储在user_role表中
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
        $name = session('adminname');
        //查询管理员的所有信息
        $data = DB::table("admin_users")->where('name','=',$name)->first();
        //加载管理员的个人信息
        return view("Admin.Adminusers.pim",['data'=>$data]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
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
        $name = $_POST['name'];
        //前台传过来的值
        $data = $request->except(['_token','_method']);        
        //加密新密码
        $data['password'] = Hash::make($data['password']);
        
        $val = array();
        $users = DB::table("admin_users")->where("name","=","$name")->first();
        foreach($users as $key=>$value){
            $val[$key]=$value;
        }
        if(DB::table("admin_users")->update($data)){
            return redirect("/adminlogin")->with("success","添加成功");
        }else{
            return back()->with("error","修改失败");
        }      
    }
    //修改角色
    public function editrole(){
        echo "修改角色";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
 
}
