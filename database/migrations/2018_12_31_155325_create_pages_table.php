<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('单页名称');
            $table->string('unique')->comment('单页链接');
            $table->string('keyword')->nullable()->comment('关键词');
            $table->string('description')->nullable()->comment('简介');
            $table->tinyInteger('isdel')->default(1)->comment('1 可删 -1 不可删除');
            $table->tinyInteger('status')->default(1)->comment('状态：1 正常 -1 已删除');
            $table->string('extend')->nullable()->comment('预留字段');
            $table->text('content')->nullable()->comment('单页内容');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
