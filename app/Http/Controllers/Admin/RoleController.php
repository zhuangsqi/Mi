<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = DB::table("role")->get();
      return view("Admin.Role.index",['role'=>$role]);
    }

    public function adminauth($id){
        //获取当前角色
        $role = DB::table("role")->where("id","=",$id)->first();
        //获取所有的权限
        $auth = DB::table("node")->get();
        //获取当前角色已有的权限信息
        $data=DB::table("role_node")->where("rid","=",$id)->get();
       $nid = array();
        if(count($data)){
            //遍历
            foreach($data as $key=>$value){
                $nid[] = $value->nid;
            }
            return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nid'=>$nid]);
        }else{
            //加载模板
            return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nid'=>array()]);
        }
    }
    //保存权限
    public function saveauth(Request $request){
       //获取角色ID
        $rid=$request->input("rid");
        //获取选中的权限
        $nid=$_POST['nid'];
        //删除当前角色已有的权限
        DB::table("role_node")->where("rid","=",$rid)->delete();
        $nids=array();
        //遍历
        foreach($nid as $key=>$value){
            //封装要插入的数据
            $nids['rid']=$rid;
            $nids['nid']=$value;
            //向role_node 表插入数据
            DB::table("role_node")->insert($nids);
        }

        return redirect("/adminroles")->with("success","权限分配成功");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加角色
        return view("Admin.Role.add");
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
        $data=$request->except('_token');
        $data['status']=0;
        //入库
        if(DB::table("role")->insert($data)){
            return redirect("/adminroles")->with("success","添加成功");
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
