<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    //定义与模型关联的数据表
    protected $table = "user";
    //主键
    protected $primaryKey = "id";
    //设置是否需要自动维护时间戳
    public $timestamps = true;
    
}
