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
	//后台的会员详情模块
	Route::get("/xq/{id}","Admin\UserController@xq");
	//后台无线分类模块
	Route::resource("/admincates","Admin\catesController");
	//后台分类修改
	Route::post("/catesedit/{id}","Admin\catesController@catesedit");
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
	//修改管理员密码
	Route::resource("/adminpwd","Admin\AdminuserController@gedit");
	//后台品牌管理模块
	Route::resource("/adminproduct","Admin\ProductController");
	//后台品牌管理修改
	Route::post("/productedit/{id}","Admin\ProductController@productedit");
	//后台公告模块
	Route::resource("/article","Admin\ArticleController");
	//后台公告下架
	Route::get("/xiajia","Admin\ArticleController@xiajia");
	//后台公告修改
	Route::post("articleedit/{id}","Admin\ArticleController@articleedit");
	//快递
	Route::resource("/express","Admin\ExpressController");
	//后台购物车管理
	Route::resource("/cart","Admin\ArticleController");
	//后台轮播图管理
	Route::resource("/lbt","Admin\LbtController");
	//后台友情链接模块
	Route::resource("/link","Admin\LinkController");
	//订单列表
	 Route::resource("/orders","Admin\OrdersController");
	 //订单详情
	 Route::get("/dxq","Admin\OrdersController@dxq");
	 //评分管理
	 Route::resource("/scores","Admin\ScoreController");
	 //评论修改
	 Route::get("/scresupdates","Admin\ScoreController@scresupdates");
	 //评论状态
	 Route::get("/zhuangtai","Admin\ScoreController@zhuangtai");
	 //屏蔽词管理
	 Route::get("/scress","Admin\ScoreController@scress");
});

