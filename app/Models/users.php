<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
   protected $table = "adminuser";
   protected $primaryKey = 'id';
   public $timestamps = true;
   protected $fillable = ['name','sex','phone','email','face','password','token','status','updated_at','created_at'];
}
