<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //与模型关联的数据表
    protected $table = 'articles';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = true;
    //可以被批量赋值的属性
    protected $fillable = ['username',"password","email","phone","created_at","updated_at"];

    //修改器 对数据做自动处理 status 字段名 
    public function getIsshowAttribute($value){
    	$isshow=[0=>"隐藏",1=>"显示"];
    	return $isshow[$value];

    }
}
