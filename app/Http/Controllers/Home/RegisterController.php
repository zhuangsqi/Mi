<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Hash;
use App\Models\Users;
use App\Http\Requests\HomeMailRequest;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Home.Register.register');
    }

    public function send(){
        echo '发送邮件';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Register.register');
    }

    public function sendMail($email,$id,$token){
        Mail::send('Home.Register.SendMail',['id'=>$id,'token'=>$token],function($message) use ($email){
            $message->to($email);
            $message->subject('激活账号');
        });
        return true;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeMailRequest $request)
    {
        $data = $request->except(['repassword','_token']);
        $data['status']=0;
        $data['face']=0;
        $data['password']=Hash::make($data['password']);
        $data['token']=str_random(50);
        $user=Users::create($data);
        $id = $user->id;
        $res=$this->sendMail($data['email'],$id,$data['token']);
        if($res){
            return redirect('http://mail.qq.com');
        }else{
            return back()->with('error','请重新发送邮件');
        }
    }

    //激活账号
    public function jihuo(Request $request){
        $id=$request->input('id');
        //获取数据表数据
        $info=Users::where('id','=',$id)->first();
        //检验token值
        $token=$request->input('token');
        if($token==$info->token){
            //执行数据修改
            $data['status']=1;
            if(Users::where('id','=',$id)->update($data)){
                return redirect('/login')->with('success','账号激活成功,请登录!');
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
}
