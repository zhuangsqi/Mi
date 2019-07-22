<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Scores extends Model
{
    //
      //与模型关联的数据表
    protected $table = 'scores';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = true;
    //可以被批量赋值的属性
    protected $fillable = ['name','goodsScore','servicScore','timeScore','content','status'];
    public function getStatusAttribute($value){
    	$status=[0=>"隐藏",1=>"显示"];
    		return $status[$value];
    		
    }
     public function getGoodsScoreAttribute($value){
    	
    
    	$goodsScore = [0=>"☆☆☆☆☆",1=>"★☆☆☆☆",2=>"★★☆☆☆",3=>"★★★☆☆",4=>"★★★★☆",5=>"★★★★★"];
    
    		return $goodsScore[$value];
    		
    }
    public function getServiceScoreAttribute($value){
    	
    
    	$serviceScore = [0=>"☆☆☆☆☆",1=>"★☆☆☆☆",2=>"★★☆☆☆",3=>"★★★☆☆",4=>"★★★★☆",5=>"★★★★★"];
    
    		return $serviceScore[$value];
    		
    }
    public function getTimeScoreAttribute($value){
    	
    
    	$timeScore = [0=>"☆☆☆☆☆",1=>"★☆☆☆☆",2=>"★★☆☆☆",3=>"★★★☆☆",4=>"★★★★☆",5=>"★★★★★"];
    
    		return $timeScore[$value];
    		
    }
}
