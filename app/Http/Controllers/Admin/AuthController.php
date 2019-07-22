<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Userss;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据总条数
       // $tot=Userss::count();
       //  dd($tot);
        //获取权限列表
       $auth = DB::table("node")->get();
       return view("Admin.Auth.index",['auth'=>$auth]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加权限
        return view("Admin.Auth.add");
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
        if(DB::table("node")->insert($data)){
            return redirect("/auth")->with("success","添加成功");
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
        //删除权限
        $data = DB::table("node")->where("id","=",$id)->first();
        //执行删除操作
        if(DB::table("node")->where("id","=",$id)->delete()){
            return redirect("/auth")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //根据id查出要修改的信息
        $info = DB::table("node")->where("id","=",$id)->first();
        return view("Admin.Auth.edit",['info'=>$info]);
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

    }
}
