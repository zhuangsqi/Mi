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

Route::group(['middleware'=>"login"],function(){
	//模板继承
	Route::resource("/admin","Admin\AdminController");
	//后台的会员模块
	Route::resource("/adminuser","Admin\UserController");
	//后台无限分类模块
	Route::resource("/admincates","Admin\CatesController");
	//后台管理员模块
	Route::resource("/adminusers","Admin\AdminuserController");
	//分配角色
	Route::get("/adminrole/{id}","Admin\AdminuserController@role");
	//保存角色
	Route::post("/saverole","Admin\AdminuserController@saverole");
	//角色管理
	Route::resource("/adminroles","Admin\RoleController");
	//分配权限
	Route::get("/adminauth/{id}","Admin\RoleController@adminauth");
	//保存权限
	Route::post("/saveauth","Admin\RoleController@saveauth");
	//权限管理
	Route::resource("/auth","Admin\AuthController");
	//快递
	Route::resource("/express","Admin\ExpressController");
});


