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
        //获取数据总条数
        $tot = Userss::count();
        //每页显示的数据条数
        $rev = 2;
        //获取最大页
        $maxpage = ceil($tot/$rev);
        //获取Ajax传递的参数 page
        $page = $request->input('page');
        if(empty($page)){
            $page=1;
        }
        //获取偏移量
        $offset = ($page-1)*$rev;
        //执行sql语句
        $data = Userss::offset($offset)->limit($rev)->get();
        //判断当前请求是否为Ajax请求
        if($request->ajax()){
            //加载模板
            return view("Admin.User.ajaxpage",['data'=>$data]);
        }

        for($i=1;$i<=$maxpage;$i++){
            //给数组赋值
            $pp[$i]=$i;    
        }
        //加载模板
        return view("Admin.User.index",['pp'=>$pp,'data'=>$data,'tot'=>$tot]);
        
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
        //初始化名字
         $name = time();
         //获取上传文件后缀
         $ext = $request->file("face")->getClientOriginalExtension();
         //移动到指定的目录下
         $request->file("face")->move("./uploads/user",$name.".".$ext);
         $data['face'] = $name.".".$ext;    	
       	 //加密密码
       	 $data['password'] = Hash::make($data['password']);
         $data['created_at'] = time("Y-m-d H:i:s");
       	 if(DB::table("adminuser")->insert($data)){
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
    //会员信息的修改
    public function user(Request $request){
        dd($_POST);
    }
    public function edit($id)
    {
       $data = Userss::where("id","=",$id)->first();
        //遍历
        // dd($data);
        // $val = array();
        // foreach($data as $key=>$value){
        //     $val[$key]=$value;
        // }
        // dd($val);
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
