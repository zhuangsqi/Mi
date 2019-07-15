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
        $role = DB::table("role")->where("id","=",$id)->first();
        $auth = DB::table("node")->get();
        $data = DB::table("role_node")->where("rid","=",$id)->get();
        $nid = [];
        if(count($data)){
            foreach($data as $key=>$value){
                $nid[] = $value->nid;
            }
            return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nid'=>$nid]);
        }else{
            return view("Admin.Role.auth",['role'=>$role,'auth'=>$auth,'nid'=>array()]);
        }
    }
    //保存权限
    public function saveauth(Request $request){
        // echo "this is saveauth";
        //获取角色ID
        $rid=$request->input("rid");
        //获取选中的权限
        $nid=$_POST['nid'];
        // echo $rid;
     // dd($nid);
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
        //
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
        $data = $request->except("_token");
        $data['status'] = 0;
        if(DB::table("role")->insert($data)){
            return redirect("/adminroles")->with("success","添加成功");

        }else{
            return back()->with("error","添加失败");
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
