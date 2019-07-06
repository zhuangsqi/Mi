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
//后台登录
Route::resource("/adminlogin","Admin\AdminLoginController");
//后台路由组
Route::group(["middleware"=>"login"],function(){
	//模板继承
	Route::resource("/admin","Admin\AdminController");
	//后台的会员模块
	Route::resource("/adminuser","Admin\UserController");
	//后台无限分类模块
	Route::resource("/admincates","Admin\catesController");
	//后台管理员模块
	Route::resource("/adminsusers","Admin\AdminuserController");

});