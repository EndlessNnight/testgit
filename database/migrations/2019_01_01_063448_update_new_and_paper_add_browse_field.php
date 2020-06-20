<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewAndPaperAddBrowseField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->integer('browse')->default(0)->comment('浏览量');
        });
        Schema::table('paper', function (Blueprint $table) {
            $table->string('browse')->default(0)->comment('浏览量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('news', 'browse')) {
            Schema::table('news', function (Blueprint $table) {
                $table->dropColumn('browse');
            });
        }
        if (Schema::hasColumn('paper', 'browse')) {
            Schema::table('paper', function (Blueprint $table) {
                $table->dropColumn('browse');
            });
        }
    }
}
