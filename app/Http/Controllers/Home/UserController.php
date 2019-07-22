<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\users;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = session('info')->id;
        $data = Users::where('id','=',$id)->first();
        return view('Home.User.User',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $request->except(['_token','_method','pic']);
         //检测是否具有文件上传
        if($request->hasFile("pic")){
            //随机名字
            $name=time();
            //获取上传图片的后缀
            $ext=$request->file("pic")->getClientOriginalExtension();
            //直接把上传的图片保存在目录下
            $request->file("pic")->move("./upload",$name.".".$ext);
            $data['face']=$name.'.'.$ext;
        }
        
        if($data['sex']=='女'){
            $data['sex']=3;
        }else if($data['sex']=='男'){
            $data['sex']=1;
        }else if($data['sex']=='保密'){
            $data['sex']=2;
        }else{
            return back()->with('error','请输入:女/男/保密');
        }

        if(Users::where('id','=',$id)->update($data)){
            return redirect('/user');
        }else{
            return back();
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
        //
    }
}
