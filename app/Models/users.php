<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
   protected $table = "userss";
   protected $primaryKey = 'id';
   public $timestamps = true;
   protected $fillable = ['username','password','email','token','phone','created_at','updated_at'];
   public function getStatusAttribute($value){
    	$status=[0=>'禁用',1=>'开启'];
    	return $status[$value];
}
