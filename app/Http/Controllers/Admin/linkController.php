<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use App\Models\Link;
use DB;
class linkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //得到网站有情连接的数据
        $link = link::get();
        //有情连接模板的加载
        return view("Admin.Link.index",['link'=>$link]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载有情连接添加的模板
        return view("Admin.Link.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //进行添加数据的组织
        $data = $request->except('_token');
        // 执行图片的上传
        if($request->hasFile("logo")){
            $name=time();
            $ext=$request->file("logo")->getClientOriginalExtension();
            //移动
            $request->file("logo")->move("./uploads/product/",$name.".".$ext);
            //裁剪图片
            $manager = new ImageManager();
            //resize 裁剪 200 100 宽和高   save保存方法
            $manager->make("./uploads/product/".$name.".".$ext)->resize(200,100)->save("./uploads/product/"."r_".$name.".".$ext);
            //封装thumb
            $data['logo']="./uploads/product/"."r_".$name.".".$ext;
            // 执行添加操作
            if (link::create($data)) {
              return redirect("/link")->with("success","添加成功"); 
            }else{
                return back()->with("error","添加失败,请再次添加");
            }
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
        //得到数据表中每条数据表的值
        $data = DB::table("link")->where("id","=",$id)->first();
        // dd($data);
        //加载有情连接修改的模板
        return view("Admin.Link.edit",['data'=>$data]);
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
        // 排除掉数据库没有的字段
        $data=$request->except(['_token','_method']);
                // 执行图片的上传
        if($request->hasFile("logo")){
            $name=time();
            $ext=$request->file("logo")->getClientOriginalExtension();
            //移动
            $request->file("logo")->move("./uploads/product/",$name.".".$ext);
            //裁剪图片
            $manager = new ImageManager();
            //resize 裁剪 200 100 宽和高   save保存方法
            $manager->make("./uploads/product/".$name.".".$ext)->resize(200,100)->save("./uploads/product/"."r_".$name.".".$ext);
            //封装thumb
            $data['logo']="./uploads/product/"."r_".$name.".".$ext;
            // 执行修改操作
             if (link::where("id","=",$id)->update($data)) {

                 return redirect("/link")->with("success","修改成功");
             }else{

                return back()->with("error","修改失败");
             } 
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
        //直接删除
        if(link::where("id","=",$id)->delete()){
            return redirect("/link")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
