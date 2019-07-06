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

//模板继承
Route::resource("/admin","Admin\AdminController");
//后台的会员模块
Route::resource("/adminuser","Admin\UserController");





//前台继承
Route::resource('/','Home\Indexcontroller');
//注册
Route::resource('/register','Home\RegisterController');
//登录
Route::resource('/login','Home\LoginController');

//个人中心
Route::resource('/user','Home\Usercontroller');