<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
//导入Hash类
use Hash;
use DB;
//导入要调用的模型类
use App\Model\Userss;
use App\Http\Requests\UsersInsertRequest;
class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $data = DB::table("adminuser")->get();
        //加载模板
        return view("Admin.User.index",['data'=>$data]);
        
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

        $data = DB::table('adminuser')->where("id","=",$id)->first();
        //加载修改模板
        return view("Admin.User.edit",['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //会员信息修改
    public function update(Request $request, $id)
    {

        //获取修改的数据
        $data = $request->except(['_token','_method']);
        $info = DB::table("adminuser")->where("id","=",$id)->orderBy("face")->first();
        
        //执行修改
        $name = time();
         //获取上传文件后缀
         $ext = $request->file("face")->getClientOriginalExtension();
         //移动到指定的目录下
          $data['face'] = $name.".".$ext;
         $request->file("face")->move("./uploads/user",$name.".".$ext);
         
        if(DB::table('adminuser')->where("id","=",$id)->update($data)){
            unlink("./uploads/user/".$info->face);
            return redirect("/adminuser")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
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
       //用户详情
    public function xq(Request $request, $id){
        //两表关联查询数据
        $data = DB::table("adminuser")->join("user_address","adminuser.id","=","user_address.u_id")->select("user_address.id as uid","user_address.addressname as uname","user_address.addressphone","user_address.areaidpath","user_address.areaid","user_address.useraddress","user_address.createtime","adminuser.id as aid","adminuser.name as aname")->where("user_address.u_id","=",$id)->get();
        //加载用户详情列表
        return view("Admin.User.xq",['data'=>$data]);

    }
}
