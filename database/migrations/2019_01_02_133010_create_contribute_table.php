<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribute', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('姓名');
            $table->string('tel')->nullable()->comment('电话');
            $table->string('phone')->nullable()->comment('手机');
            $table->string('email')->nullable()->comment('邮箱');
            $table->string('address')->nullable()->comment('快递地址');
            $table->string('QQ')->nullable()->comment('常用QQ');
            $table->string('file')->nullable()->comment('上传文件地址');
            $table->string('expect_time')->nullable()->comment('预期的见刊时间');
            $table->string('article_title')->nullable()->comment('文章标题');
            $table->tinyInteger('purpose')->comment(' 1 普通投稿   2 职称、评级、毕业论文等');
            $table->text('comment')->nullable()->comment('备注');
            $table->string('identifier')->nullable()->comment('编号');
            $table->tinyInteger('status')->comment('状态');
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
        Schema::dropIfExists('contribute');
    }
}
