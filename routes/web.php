<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/









//登录和退出
Route::resource("/adminlogin","Admin\AdminLoginController");
//模板继承
Route::resource("/admin","Admin\AdminController");
//后台的会员模块
Route::resource("/adminuser","Admin\UserController");


//后台无限分类模块
Route::resource("/admincates","Admin\catesController");
//后台管理员模块
Route::resource("/adminusers","Admin\AdminuserController");





//前台继承
Route::resource('/','Home\Indexcontroller');
//注册
Route::resource('/register','Home\RegisterController');
//登录
Route::resource('/login','Home\LoginController');


//个人中心
Route::resource('/user','Home\Usercontroller');


Route::resource("/homeindex","Home\IndexController");


//后台无限分类模块
Route::resource("/admincates","Admin\catesController");
//后台管理员模块
Route::resource("/adminusers","Admin\AdminuserController");
//后台轮播图模块
Route::resource("/lbt","Admin\LbtController");




//前台退出登录
Route::get('/uplogin','Home\Indexcontroller@uplogin');
Route::group(['middleware'=>'homelogin'],function(){
	//个人中心
	Route::resource('/user','Home\Usercontroller');
});


//******************************************* 前台 *****************************************************




//前台继承
Route::resource('/','Home\Indexcontroller');
//邮箱注册
Route::resource('/register','Home\RegisterController');
//注册校验码
Route::get('/registercode','Home\LoginController@code');
//邮箱注册激活
Route::get('/jihuo','Home\RegisterController@jihuo');
//手机注册
Route::get('/checkphone','Home\RegisterController@checkphone');
//获取手机验证码
Route::get('/sendphone','Home\RegisterController@sendphone');
//检测验证码
Route::get('/checkcode','Home\RegisterController@checkcode');
//手机注册
Route::post('/registerphone','Home\RegisterController@registerphone');
//登录
Route::resource('/login','Home\LoginController');
//登录校验码
Route::get('/code','Home\LoginController@code');
//手机登录
Route::post('/phonelogin','Home\LoginController@phonelogin');
//前台退出登录
Route::get('/uplogin','Home\Indexcontroller@uplogin');
//找回密码 重置密码
Route::get('/repwd','Home\LoginController@repwd');
Route::post('/dorepwd','Home\LoginController@dorepwd');
Route::get('/reset','Home\LoginController@reset');
Route::post('/doreset','Home\LoginController@doreset');
//找回密码 邮箱\验证码校验
Route::get('/checkmail','Home\LoginController@checkmail');
Route::get('/repwdcheckcode','Home\LoginController@repwdcheckcode');
//前台需要登录访问的模块
Route::group(['middleware'=>'homelogin'],function(){
	//个人中心
	Route::resource('/user','Home\Usercontroller');
	//购物车
	Route::resource('/cart','Home\CartController');

});