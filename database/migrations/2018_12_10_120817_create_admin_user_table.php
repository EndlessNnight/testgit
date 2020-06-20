<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account',50)->comment("管理员账号");
            $table->string('name',50)->comment("管理员姓名")->default("管理员");
            $table->string('password',100)->comment("密码");
            $table->unsignedInteger('phone')->comment("手机号")->nullable();
            $table->string('email',50)->comment("邮箱")->nullable();
            $table->string('token',100)->comment("token验证")->nullable();
            $table->string('remember_token',100)->comment("永久token")->nullable();
            $table->smallInteger('grades')->comment("管理员等级 0:超级管理员")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
