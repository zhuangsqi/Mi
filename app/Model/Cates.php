<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
   //与模型关联的数据表
    protected $table = 'cates';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = false;
    //可以被批量赋值的属性
    protected $fillable = ['id','name','pid','path','img_url'];
    //关联方法 关联Userss和Userinfo模型类=》获取关联数据
    // "App\Models\Userinfo" 要关联的模型类  users_id 关联字段
   
}
