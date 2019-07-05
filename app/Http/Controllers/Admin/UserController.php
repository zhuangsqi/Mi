<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入Hash类
use Hash;
use DB;
//导入要调用的模型类
//use App\Providers\Userss;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索的参数
        $k = $request->input("keyword");
        //获取列表数据
        $data = DB::table("users")->where("username","like","%".$k."%")->paginate(3);
        // $data = Userss::where("username","like","%".$k."%")->paginate(3);
        //加载模板
        return view("Admin.User.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加用户的页面
        return view("Admin.Admin.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加用户
       	// dd($_POST);
       	$data = $request->except(['_token']);
       	//加密密码
       	$data['password'] = Hash::make($data['password']);
       	if(DB::create($data)){
       		return redirect("/adminuser")->with("success","添加成功");
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
         //加载用户首页
       return view("Admin.User.index"); 
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
