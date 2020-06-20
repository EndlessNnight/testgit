<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('新闻类型');
            $table->string('title')->comment('新闻标题');
            $table->date('release_time')->nullable()->comment('发布时间');
            $table->string('keyword',500)->nullable()->comment('新闻关键词');
            $table->string('description',2000)->nullable()->comment('新闻简介');
            $table->text('content')->nullable()->comment('新闻内容');

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
        Schema::dropIfExists('news');
    }
}
