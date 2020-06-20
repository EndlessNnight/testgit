<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeriodicalAddUniqueField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodical', function (Blueprint $table) {
            $table->string('unique')->nullable()->comment('唯一标示');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('periodical', 'unique')) {
            Schema::table('periodical', function (Blueprint $table) {
                $table->dropColumn('unique');
            });
        }
    }
}
