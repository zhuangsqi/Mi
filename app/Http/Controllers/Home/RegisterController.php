<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\Users;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function send(){
        //发送原始字符串 $message 消息生成器(方法)
        Mail::raw('发送邮件',function($message){
            //接收方
            $message->to("812490441@qq.com");
            //主题
            $message->subject("邮箱测试");
        });
    }
    //发送邮件测试1
    public function sends(){
        Mail::send("Home.Register.a",['id'=>12],function($message){
             //接收方
            $message->to("812490441@qq.com");
            //主题
            $message->subject("邮箱测试");
        });
    }
    //激活用户
    public function a(Request $request){
        $id=$request->input("id");
        //获取数据表数据
        $info=Users::where("id","=",$id)->first();
        // dd($info);
        //校验字段token 确保数据安全
        $token=$request->input("token");
        //做token对比
        if($token==$info->token){
            //执行数据的修改 status由0-》1
            //封装数据
            $data['status']=1;
            if(Users::where("id","=",$id)->update($data)){
                echo "用户已经激活，可以登录";
            }
        }
        
    }

    //引入校验码
    public function code(){
        //生成校验码代码
        ob_clean();//清除操作
        //实例化校验码类
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session方便和输入的校验码对比
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        //输出
        $builder->output();
        // die;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("Home.Register.register");
    }
    //发送邮件激活用户 $email 要注册的邮箱 $id 注册的用户id $token 校验参数
    public function sendMail($email,$id,$token){
        //闭包函数内部获取闭包函数外部的变量 use
        Mail::send("Home.Register.a",['id'=>$id,'token'=>$token],function($message) use ($email){
             //接收方
            $message->to($email);
            //主题
            $message->subject("激活用户");
        });

        return true;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取输入校验码
        $code=$request->input("code");
        //获取系统的校验码
        $vcode=session("vcode");
        // echo $code.":".$vcode;
        if($code==$vcode){
            //数据库插入
            $data=$request->except(['_token','repassword','code']);
            // dd($data);
            //密码加密
            $data['password']=Hash::make($data['password']);
            $data['username']="admin".rand(1,10000);
            $data['status']=0;
            $data['token']=str_random(50);
            // dd($data);
            $user=Users::create($data);
            //获取刚刚插入的数据id
            $id=$user->id;
            // echo "ok";
            if($id){
                 //直接调用发送邮件函数
                $res=$this->sendMail($data['email'],$id,$data['token']);
                if($res){
                    return redirect("https://mail.qq.com");
                }else{
                    return back()->with("error","请重新发送邮件");
                }
                
            }
           
        }else{
            return back()->with("error","两次校验码不一致");
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
    //校验手机号是否被注册
    public function checkphone(Request $request){
        // echo "sss";
        //获取注册的手机号
        $p=$request->input("p");
        //获取数据表的phone字段值
        $data=Users::pluck("phone");
        $pp=array();
        //转换为一维数组
        foreach($data as $key=>$value){
            $pp[$key]=$value;
        }
        // dd($pp);
        // in_array();
        if(in_array($p,$pp)){
            echo 1;//手机号已经被注册
        }else{
            echo 0;//手机号可用
        }
    }
}
