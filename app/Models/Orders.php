<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{    
    //与模型关联的数据表
    protected $table = 'orders';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = false;
    //可以被批量赋值的属性
    protected $fillable = ['order_num',"user_id","address_id","status"];

    //修改器 对数据做自动处理 status 字段名 
    public function getStatusAttribute($value){
    	$status=[0=>"下单",1=>"未付款",2=>"未发货",3=>"已发货",4=>"待评价",5=>"订单已完成"];
    	return $status[$value];

    }
}
