<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodicalTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodical_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->comment("名称");
            $table->tinyInteger('level')->default(0)->comment('类别等级');
            $table->tinyInteger('reorder')->default(0)->comment('排序 0~100');
//            $table->integer('ambit_left')->comment("左界限")->default(0);
//            $table->integer('ambit_right')->comment("右界限")->default(0);
//            $table->tinyInteger('depth_level')->comment("层级深度")->default(0);
//            $table->tinyInteger('last_label')->comment("0：标签 1： 标签组 （最为标签存在时 无法添加下级）")->default(1);
//            $table->tinyInteger('status')->comment("状态 0：正常 -1：删除 ")->default(0);
            $table->integer('pid')->default(0)->comment('父级分类');
            $table->index('pid');

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
        Schema::dropIfExists('periodical_type');
    }
}
