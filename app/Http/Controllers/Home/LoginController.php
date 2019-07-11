<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Http\Requests\HomeLoginRequest;
use Gregwar\Captcha\CaptchaBuilder; 
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
    public function store(HomeLoginRequest $request)
    {
        $code = $request->input('code');
        $vcode=session('vcode');
        if(!$code == $vcode){
            return back()->with('error','检验码错误');
        }
        $name = $request->name;
        $password = $request->password;

        $info = DB::table('adminuser')->where('name','=',$name)->first();
        if($info){      
            if(Hash::check($password,$info->password)){
                session(['name'=>$name]);
                return redirect('/');
            }else{
                return back()->with('error','账号或密码错误');
            }
        }else{
            return back()->with('error','账号或密码错误');
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
