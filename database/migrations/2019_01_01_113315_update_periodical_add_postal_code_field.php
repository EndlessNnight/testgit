<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeriodicalAddPostalCodeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodical', function (Blueprint $table) {
            $table->string('postal_code')->nullable()->comment('邮发代号');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('periodical', 'postal_code')) {
            Schema::table('periodical', function (Blueprint $table) {
                $table->dropColumn('postal_code');
            });
        }
    }
}
