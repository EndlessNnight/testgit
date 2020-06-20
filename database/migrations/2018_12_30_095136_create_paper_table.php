<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('论文类型');
            $table->string('title')->comment('论文类型');
            $table->date('release_time')->nullable()->comment('发布时间');
            $table->string('keyword',500)->nullable()->comment('关键词');
            $table->string('description',2000)->nullable()->comment('论文摘要');
            $table->text('content')->nullable()->comment('论文内容');

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
        Schema::dropIfExists('paper');
    }
}
