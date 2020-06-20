<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodical', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('期刊名称');
            $table->string('img_url')->comment('期刊封面')->nullable();
            $table->tinyInteger('type_id')->comment('分类ID');
            $table->tinyInteger('level')->comment('期刊等级: 1:省级 2:国家级 3:核心期刊');
            $table->string('responsible',500)->comment('主管单位')->nullable();
            $table->string('sponsor',500)->comment('主办单位')->nullable();
            $table->string('international_ornp')->comment('国际刊号')->nullable();
            $table->string('internal_ornp')->comment('国内刊号')->nullable();
            $table->string('employ_web')->comment('收录网站')->nullable();
            $table->text('synopsis')->comment('杂志介绍')->nullable();
            $table->text('employ_impact')->comment('收录情况/影响因子')->nullable();
            $table->text('columns')->comment('栏目设置')->nullable();
            $table->text('demand')->comment('征稿要求')->nullable();

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
        Schema::dropIfExists('periodical');
    }
}
