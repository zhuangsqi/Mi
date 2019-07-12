<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//邮箱注册
use Mail;
//加密
use Hash;
//模型
use App\Models\Users;
//表单检验
use App\Http\Requests\HomeMailRequest;
//校验码
use Gregwar\Captcha\CaptchaBuilder;
//短信引入
use Qcloud\Sms\SmsSenderUtil; 
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

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Register.register');
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
        $code = $request->input('code');
        $vcode = session('vcode');
        if(!$code==$vcode){
            return back()->with('error','检验码不正确,请重新输入');
        }
        $data = $request->except(['repassword','_token']);
        $data['status']=0;
        $data['face']=0;
        $data['name']='pt'.rand(1,10000);
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

    public function checkphone(Request $request){
        //获取手机号
        $p=$request->input('p');
        //获取用户表的phone字段
        $data=Users::pluck('phone');
        //获取的数据转换为一维数组
        $pp=array();
        foreach($data as $key=>$value){
            $pp[$key]=$value;
        }
        //判断手机号是否存在数据中
        if(in_array($p,$pp)){
            echo 1;//手机号已经注册
        }else{
            echo 0;//手机号可用
        }

    }
}
