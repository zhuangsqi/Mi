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
//前台退出登录
Route::get('/uplogin','Home\Indexcontroller@uplogin');
Route::group(['middleware'=>'homelogin'],function(){
	//个人中心
	Route::resource('/user','Home\Usercontroller');
});





