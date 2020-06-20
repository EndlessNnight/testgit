<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewsTableAddField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->tinyInteger('recommend')->default(0)->comment('是否推荐 0:不推荐 1:推荐');
            $table->string('recommend_img')->nullable()->comment('推荐位置 图片地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('news', 'recommend')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropColumn('recommend');
            });
        }
        if (Schema::hasColumn('news', 'recommend_img')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropColumn('recommend_img');
            });
        }
    }
}
