<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdminuser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('adminuser', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sex');
            $table->string('phone');
            $table->string('email');
            $table->string('face');
            $table->string('password');
            $table->string('createtime');
            
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
        Schema::drop('adminuser');
    }
}
