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






//前台继承
Route::resource('/','Home\Indexcontroller');
//注册
Route::resource('/register','Home\RegisterController');
//激活账号邮件
Route::get('/jihuo','Home\RegisterController@jihuo');

//登录
Route::resource('/login','Home\LoginController');
//校验码
Route::get('/code','Home\LoginController@code');
//前台退出登录
Route::get('/uplogin','Home\Indexcontroller@uplogin');
Route::group(['middleware'=>'homelogin'],function(){
	//个人中心
	Route::resource('/user','Home\Usercontroller');
	//购物车
	ROute::resource('/cart','Home\CartController');

});









