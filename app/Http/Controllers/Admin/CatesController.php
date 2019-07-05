<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索关键词
        $k=$request->input('keyword');
        //调整类别顺序连贯方法 Raw 原始表达式,防止sql语句注入
        $cates=DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->where("name","like","%".$k."%")->orderBy("paths")->get();
        //遍历数据
        foreach($cates as $key=>$value){
            $path=$value->path;
            //转换为数组
            $arr=explode(",",$path);
            //获取逗号个数
            $len=count($arr)-1;
            //str_repeat 重复字符串
            $cates[$key]->name=str_repeat("--|",$len).$value->name;
        }
        return view("Admin.Cates.index",['cates'=>$cates,'request'=>$request->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板  获取所有的分类
        $cates = DB::table("cates")->get();
         return view("Admin.Cates.add",['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except('_token');
       //获取pid
       $pid = $request->input("pid");
       //区分两种添加
       if($pid == 0){
        //添加顶级分类
        $data['path'] = '0';
       }else{
        //添加的是子级分类  封装path  (父类的path和父类id拼接)
        //获取父类信息
        $info = DB::table("cates")->where("id","=",$pid)->first();
        $data['path']=$info->path.",".$info->id;
       }
       //入库
       if(DB::table("cates")->insert($data)){
        return redirect("/admincates")->with("success","添加成功");
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
        //获取当前类别的子类个数 如果子类个数>0 有子类 
        $s = DB::table("cates")->where("pid","=",$id)->count();
        if($s > 0){
        	//给提示信息
        	return redirect("/admincates")->with('error',"请先干掉孩子");
        }else{
        	//直接删除类别
        	if(DB::table("cates")->where("id","=",$id)->delete()){
        		return redirect("/admincates")->with("success","删除成功");
        	}else{
        		return redirect("/admincates")->with("error","删除失败");
        	}
        }
    }
}

