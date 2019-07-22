<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // /模型关联数据表
    protected $table = "link";
    //是否自动开启时间戳, 不开启
    public $timestamps = false;
    //规定主键
    protected $primaryKey = "id";
    //给属性批量赋值,属性必须要写,否则是不能插入数据的
    protected $fillable = ['name','adress','logo','descr','status'];
    // 修改器对数据进行status字段的自动处理
    public function getStatusAttribute($value){
        $status=[0=>"禁用",1=>"开启"];
        return $status[$value];

    }
}