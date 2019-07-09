<?php

namespace App\Http\Middleware;

use Closure;

class HomeLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //检测当前是否具有登录的session
        if($request->session()->has('name')){
            //执行下个请求
            return $next($request);
        }else{
            //跳转到登录界面
            return redirect("/login");
        }
    }
}
