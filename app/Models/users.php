<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
   protected $table = "adminuser";
   protected $primaryKey = 'id';
   public $timestamps = true;
   protected $fillable = ['name','sex','phone','email','face','password','token','status','updated_at','created_at'];
   public function getSexAttribute($value){
   		$sex=[3=>"女",1=>"男",2=>"保密"];
    	return $sex[$value];
   }
}
