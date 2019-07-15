<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ExpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table("express")->get();
        $id = 1;
        return view("Admin.Express.index",['data'=>$data,'id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Express.add");
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
        $data['status'] = 0;
        $name=time();
        $files =$request->file('logo')->getClientOriginalExtension(); 
        $request->file("logo")->move("./uploads/Express/",$name.".".$files);
        $data['logo']=$name.".".$files;
        if(DB::table('express')->insert($data)){
            return redirect("/express")->with("success","添加成功");

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
        $data = DB::table("express")->where("id","=",$id)->first();

        return view("Admin.Express.edit",['data'=>$data]);
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
        $data = $request->except("_token","_method");

        $del = DB::table("express")->where("id","=",$id)->orderBy("logo")->first();
        
        unlink('./uploads/Express/'.$del->logo);
        $id = $data['id'];
        $name=time();
        $files =$request->file('logo')->getClientOriginalExtension(); 
        $request->file("logo")->move("./uploads/Express/",$name.".".$files);
        $data['logo']=$name.".".$files;

        if(DB::table("express")->where("id","=",$id)->update($data)){
            return redirect("/express")->with("success","添加成功");

        }else{
            return back()->with("error","添加失败");
        }
        DB::table("express")->where("id","=",$id)->update($data);
      
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
