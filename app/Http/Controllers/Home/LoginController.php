<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
use App\Http\Requests\HomeMailLoginRequest;
use App\Http\Requests\HomePhoneLoginRequest;
use App\Http\Requests\RepwdRequest;
use Gregwar\Captcha\CaptchaBuilder; 
use App\Models\Users;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Home.Login.login');
    }

    public function code(){
        // 生成校验码代码    
        ob_clean();//清除操作
        //实例化检验码        
        $builder = new CaptchaBuilder;       
        //可以设置图片宽高及字体       
        $builder->build($width = 100, $height = 47, $font = null);        
        //获取验证码的内容        
        $phrase = $builder->getPhrase();        
        //把内容存入session 用于对比输入的校验码
        session(['vcode'=>$phrase]);        
        //生成图片        
        header("Cache-Control: no-cache, must-revalidate");        
        header('Content-Type: image/jpeg');        
        $builder->output();        
        //die;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeMailLoginRequest $request)
    {
        $code = $request->input('code');
        $vcode=session('vcode');
        if(!$code == $vcode){
            return back()->with('error','检验码错误!!!');
        }
        $email = $request->email;
        $password = $request->password;

        $info = DB::table('adminuser')->where('email','=',$email)->first();
        if($info){      
            if(Hash::check($password,$info->password)){
                if($info->status == 1){
                    session(['name'=>$info->name]);
                    return redirect('/');
                }else{
                    return back()->with('error','账号没有激活!!!');
                }      
            }else{
                return back()->with('error','账号或密码错误!!!');
            }
        }else{
            return back()->with('error','账号或密码错误!!!');
        }        
    }

    //手机登录
    public function phonelogin(HomePhoneLoginRequest $request){
        $code = $request->input('code');
        $vcode=session('vcode');
        if(!$code == $vcode){
            return back()->with('error','检验码错误!!!');
        }
        $phone = $request->phone;
        $password = $request->password;

        $info = DB::table('adminuser')->where('phone','=',$phone)->first();
        if($info){      
            if(Hash::check($password,$info->password)){
                if($info->status == 1){
                    session(['name'=>$info->name]);
                    return redirect('/');
                }else{
                    return back()->with('error','账号没有激活!!!');
                }     
            }else{
                return back()->with('error','账号或密码错误!!!');
            }
        }else{
            return back()->with('error','账号或密码错误!!!');
        }         
    }

    //重置密码
    public function repwd(Request $request){
        return view('Home.Login.repwd');
    }

    public function checkmail(Request $request){
        //获取邮箱
        $m=$request->input('m');
        //获取用户表的email字段
        $data=Users::pluck('email');
        //获取的数据转换为一维数组
        $mm=array();
        foreach($data as $key=>$value){
            $mm[$key]=$value;
        }
        //判断邮箱是否存在数据中
        if(!empty($m)){
            if(in_array($m,$mm)){
                echo 1;//邮箱已经注册
            }else{
                echo 0;//邮箱未注册
            }
        }else{
            echo 3;//请输入邮箱
        }

    }

    public function repwdcheckcode(Request $request){
        //输入的校验码
        $code=$request->input("code");
        $vcode=session('vcode');
        if(!empty($code)){
            if($code == $vcode){
                echo '1';  //校验码正确
            }else{
                echo '2';   //校验码错误
            }
        }else{
            echo '3';   //请输入校验码
        }
    }

    public function sendMail($email,$id,$token){
        Mail::send('Home.Login.repwdmail',['id'=>$id,'token'=>$token],function($message) use ($email){
            $message->to($email);
            $message->subject('密码重置');
        });
        return true;
    }

    public function dorepwd(Request $request){
        $code=$request->input('code');
        $vcode=session('vcode');
        if($code==$vcode){
            $mail=$request->input('mail');
            $info=Users::where('email','=',$mail)->first();
            $id=$info->id;
            $email=$info->email;
            $token=$info->token;
            $res=$this->sendMail($email,$id,$token);
            if($res){
                echo '重置密码邮件已发送,请登录邮箱点击重置!';
            }else{
                return back()->with('error','请重新发送邮件!!!');
            }
        }else{
            return back()->with('error','验证码不正确!!!');
        }
    }

    public function reset(Request $request){
        $id=$request->input('id');
        $token=$request->input('token');
        $info=Users::where('id','=',$id)->first();
        if($token==$info->token){
            return view('Home.Login.reset',['id'=>$id]);
        }else{
            echo '参数错误,请重新获取邮件!!!';
        }
    }

    public function doreset(RepwdRequest $request){
        $id=$request->input('id');
        $data=$request->except(['repassword','_token']);
        $data['token']=str_random(50);
        $data['password']=Hash::make($data['password']);
        if(Users::where('id','=',$id)->update($data)){
            return redirect('/login')->with('success','密码重置成功!');
        }else{
            return back()->with('error','密码重置失败,请重新获取邮件!');
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
