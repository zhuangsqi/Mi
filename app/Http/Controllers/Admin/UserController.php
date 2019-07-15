<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
//导入Hash类
use Hash;
use DB;
use App\Models\Users;
//导入要调用的模型类
//use App\Providers\Userss
// use App\Http\Requests\UsersInsertRequest;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id =1;
        //获取搜索的参数
        $k = $request->input("keyword");
        //获取列表数据
        $data = Users::where("name","like","%".$k."%")->paginate();
     
        //加载模板
        return view("Admin.User.index",['data'=>$data,'request'=>$request->all(),'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加用户的页面
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

       	$data = $request->except(['_token']);
        $data['status'] = 0;
        $data['token'] = str_random(50);
        $name=time();
        $files =$request->file('face')->getClientOriginalExtension(); 
        $request->file("face")->move("./uploads/Face/",$name.".".$files);
         
        $data['face']=$name.".".$files;
       	//加密密码
       	$data['password'] = Hash::make($data['password']);
       	if(Users::create($data)){
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
        return view("Admin.User.edit");
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table("adminuser")->where("id","=",$id)->delete()){
            return redirect("/adminuser")->with("success","删除成功");
        }else{
            return redirect("/adminuser")->with("success",'删除失败');
        }
    }
}
