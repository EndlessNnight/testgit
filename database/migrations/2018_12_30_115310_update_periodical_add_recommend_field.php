<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeriodicalAddRecommendField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodical', function (Blueprint $table) {
            $table->string('recommend')->nullable()->comment('推荐位置');
            $table->string('recommend_img')->nullable()->comment('首页推荐图片');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('periodical', 'recommend')) {
            Schema::table('periodical', function (Blueprint $table) {
                $table->dropColumn('recommend');
                $table->dropColumn('recommend_img');
            });
        }
    }
}
