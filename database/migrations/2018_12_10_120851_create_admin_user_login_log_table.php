<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserLoginLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_login_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment("用户 id")->nullable();
            $table->string('login_user',20)->comment("登陆的用户名")->nullable();
            $table->string('login_password',50)->comment("登陆的密码")->nullable();
            $table->string('ip',20)->comment("用户登陆IP")->nullable();
            $table->smallInteger('status')->comment("登陆状态 0：登陆失败 1：登陆成功")->nullable();
            $table->dateTime('create_time')->comment('创建时间')->nullable();
            $table->index('user_id');
            $table->index('login_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user_login_log');
    }
}
