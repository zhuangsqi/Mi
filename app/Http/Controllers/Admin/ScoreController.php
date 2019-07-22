<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Scores;
use DB;
class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = Scores::get();
        $id = 1;
        return view("Admin.Score.index",['data'=>$data]);
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
    //订单列表状态
    public function zhuangtai(Request $request){
        $id = $request->input('id');
        $data = DB::table("orders")->where("id","=",$id)->first();
         if($data ->status == 2){
             $info['status'] = 3;
         }
         if(DB::table("orders")->where("id","=",$id)->update($info)){
             $info1 = DB::table("orders")->where("id","=",$id)->first();
             echo json_encode($info1);
         }



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
        //
    }
    public function scresupdates(Request $request){
        $id = $request->input("id");
        $data = DB::table("scores")->where("id","=",$id)->first();
        if($data->status == 1){
           $info['status'] = 0;
        }else{
            $info['status'] = 1;
        }
         if(DB::table("scores")->where("id","=",$id)->update($info)){
           $data1 = Scores::where("id","=",$id)->first();
           echo json_encode($data1);
         };
        
      

        // session(['score'=>$data1]);
        
    }
    public function scress(Request $request){
        return view("Admin.Score.screen");
    }
    public function scressupdate(Request $request){
        $data = $request->all();
        
    }
}
