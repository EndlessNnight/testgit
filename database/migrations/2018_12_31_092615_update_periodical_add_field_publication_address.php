<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeriodicalAddFieldPublicationAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('periodical', function (Blueprint $table) {
            $table->string('publication_address')->nullable()->comment('出版地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('periodical', 'publication_address')) {
            Schema::table('periodical', function (Blueprint $table) {
                $table->dropColumn('publication_address');
            });
        }
    }
}
