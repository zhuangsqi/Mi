<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAppraises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('appraises', function (Blueprint $table) {
            $table->increments('id'); //ID
            $table->integer('gid');  //商品ID
            $table->integer('uid');  //用戶ID
            $table->string('content');  //评论内容
            $table->string('reply');  //店铺回复
            $table->string('images');  //上传图片
            $table->string('created_at');  //创建时间
            $table->string('reply_at');  //回复时间
            $table->tinyInteger('status');  //状态



            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('appraises');
    }
}
