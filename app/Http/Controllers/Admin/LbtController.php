<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//use App\Model\Lbt;
class LbtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $k = $request->input("keyword");
        //获取列表数据
        $data = DB::table("lbt")->where("pic","like","%".$k."%")->paginate(5);
        // $data = Userss::where("username","like","%".$k."%")->paginate(3);
        //加载模板
        return view("Admin.Lbt.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Lbt.add");
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
            $ext = $request->file("pic")->getClientOriginalExtension();
            $data['pic'] = $data['code'].".".$ext;
            $request->file("pic")->move("./uploads",$data['pic']);
            //dd($data);
            if(DB::table("lbt")->insert($data)){
                return redirect("/lbt")->with("success","添加成功");
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

         $data=DB::table("lbt")->where("id","=",$id)->first();
        //加载模板
        return view("Admin.Lbt.edit",['data'=>$data]);
    
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
            $data=$request->except(['_token','_method']);
            $data1 = DB::table("lbt")->find($id);
            // dd($data1->pic);
            // dd($data);
            // dd($data1);
            $ext = $request->file("pic")->getClientOriginalExtension();
             $request->file("pic")->move("./uploads",$data['code'].".".$ext);
            $data['pic'] = $data['code'].".".$ext;
            // dd($data);
           
            //dd($data);
            // var_dump($data);exit;
        //执行修改
        if(DB::table("lbt")->where("id","=",$id)->update($data)){
            unlink('./uploads/'.$data1->pic);
            return redirect("/lbt")->with("success","修改成功");
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

        $data = DB::table("lbt")->find($id);
        //dd($data);
        
         if(DB::table("lbt")->where("id","=",$id)->delete()){
            unlink('./uploads/'.$data->pic);
            return redirect("/lbt")->with("success","删除成功");
        }else{
            return redirect("/lbt")->with("success",'删除失败');
        }
    }
}
