<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePaperAddRecommendField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paper', function (Blueprint $table) {
            $table->tinyInteger('recommend')->default(0)->comment('0：不推荐 1：推荐');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('paper', 'recommend')) {
            Schema::table('paper', function (Blueprint $table) {
                $table->dropColumn('recommend');
            });
        }
    }
}
