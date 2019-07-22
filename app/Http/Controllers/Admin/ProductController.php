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
        // $data = DB::table("admin_product")->get();
        //关联两表查询数据 cates 和admin_product
        $data = DB::table("admin_product")->join("cates","admin_product.uid","=","cates.id")->select("admin_product.id as aid","admin_product.name as aname","admin_product.logo","admin_product.cate_id","admin_product.goods","admin_product.money","admin_product.amount","admin_product.uid","cates.id as cid","cates.name as cname")->get();
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
        //获取所有的类别
        $cate = CatesController::getCates();
        //加载产品添加视图
        return view("Admin.Adminproduct.add",['cate'=>$cate]);
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
    //后台商品列表修改
    public function productedit(Request $request, $id){
        $data = $request->except('_token');
        $info = DB::table("admin_product")->where("id","=",$id)->first();
        //获取上传文件后缀
        $hou = $request->file("logo")->getClientOriginalExtension();
        //初始化名字
         $name = time();
         //移动到指定的目录下
         $request->file("logo")->move("./uploads/product",$name.".".$hou);
         $data['logo'] = $name.".".$hou;
         

         if(DB::table('admin_product')->where("id","=",$id)->update($data)){
             unlink("./uploads/product/".$info->logo);
            return redirect("/adminproduct")->with("success","修改成功");
         }else{
            return back()->with("error","修改失败");
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
        //查询要修改的商品信息
        $info = DB::table("admin_product")->where("id","=",$id)->first();
        //加载修改视图
        return view("Admin.Adminproduct.edit",['info'=>$info]);
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
