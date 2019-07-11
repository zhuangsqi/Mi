<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取产品列表信息
        $data = DB::table("admin_product")->get();
        //加载产品列表
        return view("Admin.Adminproduct.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载产品添加视图
        return view("Admin.Adminproduct.add");
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
         $ext = $request->file("logo")->getClientOriginalExtension();
        //移动到指定的目录下
        $request->file("logo")->move("./uploads/product",$name.".".$ext);
        $data['logo'] = $name.".".$ext;
        if(DB::table("admin_product")->insert($data)){
            return redirect("/adminproduct")->with("success","添加成功");
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
        //直接删除
        if(DB::table("admin_product")->where("id","=","$id")->delete()){
            return redirect("/adminproduct")->with("success","删除成功");
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
        echo "1";
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
