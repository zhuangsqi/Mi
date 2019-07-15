<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //与模型关联的数据表
    protected $table = 'adminuser';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = true;
    //可以被批量赋值的属性
    protected $fillable = ['name',"password","email","phone","created_at","updated_at","face","sex","status","token"];

    //修改器 对数据做自动处理 status 字段名 
    public function getStatusAttribute($value){
    	$status=[0=>"禁用",1=>"开启"];
    	return $status[$value];

    }
   
    //关联方法 关联Userss和Userinfo模型类=》获取关联数据
    // "App\Models\Userinfo" 要关联的模型类  users_id 关联字段
    public function info(){
    	return $this->hasOne("App\Models\Userinfo","users_id");
    }

    //关联Userss和Useraddress模型类=>获取会员下的所有地址
    public function address(){
    	return $this->hasMany("App\Models\Useraddress","user_id");
    }
    
}
