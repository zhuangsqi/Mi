<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入组件类
use Intervention\Image\ImageManager;
use Config;
use App\Model\Articles;
//导入OSS类
use App\Services\OSS;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Articles::get();
         //加载公告列表
         return view("Admin.Article.index",['data'=>$data]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加公告列表
        return view("Admin.Article.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except("_token");
        //长传在aliyun oos下
        //执行图片的上传
         if($request->hasFile("face")){
            $file = $request->file("face");
             $name = time();
            $ext = $request->file("face")->getClientOriginalExtension();
            $newfile = $name.".".$ext;
            $filepath = $file->getRealPath();
            //OSS上传z
            //$newfile上传到阿里云oss平台下的文件名字
            OSS::upload($newfile,$filepath);
            //裁剪图片
            $manager = new ImageManager();
            $manager->make(env('ALIURL').$name.".".$ext)->resize(100,100)->save(Config::get("app.app_upload")."r_".$name.".".$ext);
            //封装thumb
            $data['face'] = Config::get("app.app_upload")."r_".$name.".".$ext;
            //执行数据库的插入
            if(Articles::insert($data)){
                return redirect("/article")->with("success","添加成功");
            }else{
                return back()->with("error","添加失败");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //获取删除的数据
        $info = Articles::where("id","=","$id")->first();
        //删除裁剪后的图
        unlink("/".$info->face);
        if(Articles::where("id","=","$id")->delete()){
        	return redirect("/article")->with("success","删除成功");
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
       //查询公告数据
       $info = DB::table('articles')->where("id","=",$id)->first();
       //加载修改公告的视图
       return view("Admin.Article.edit",['info'=>$info]);
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
       
    }
    //下架
    public function xiajia(Request $request){
    	$id = $request->input('id');
    	$data = DB::table("articles")->where("id","=",$id)->first();
        if($data->isshow == 1){
            $info['isshow'] = 0;
        }else{
            $info['isshow'] =1;
        }
         if(DB::table("articles")->where("id","=",$id)->update($info)){
            $info1 = Articles::where("id","=",$id)->first();
            echo json_encode($info1);

        };
                    
        
    }
    public function articleedit(Request $request, $id){
        $data = $request->except('_token');
         //初始化名字
        $name = time(); 
        //获取上传文件后缀
         $ext = $request->file("face")->getClientOriginalExtension();
        //移动到指定的目录下
        $request->file("face")->move("./",$name.".".$ext);
        $data['face'] = $name.".".$ext;
        //执行修改
        if(DB::table("articles")->where("id","=",$id)->update($data)){

            return redirect("/article")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
    }
}
