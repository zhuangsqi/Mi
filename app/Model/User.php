<?php

namespace App\Providers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Providers
{
    //定义与模型关联的数据表
    protected $table = "user";
    //主键
    protected $primaryKey = "id";
    //设置是否需要自动维护时间戳
    public $timestamps = true;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
