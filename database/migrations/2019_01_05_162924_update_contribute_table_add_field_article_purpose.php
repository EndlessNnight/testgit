<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContributeTableAddFieldArticlePurpose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contribute', function (Blueprint $table) {
            $table->tinyInteger('level')->nullable()->comment('文章级别');
            $table->integer('type_id')->nullable()->comment('期刊科目');
            $table->string('ip',20)->nullable()->comment('IP地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('contribute', 'level')) {
            Schema::table('contribute', function (Blueprint $table) {
                $table->dropColumn('level');
            });
        }
        if (Schema::hasColumn('contribute', 'type_id')) {
            Schema::table('contribute', function (Blueprint $table) {
                $table->dropColumn('type_id');
            });
        }

        if (Schema::hasColumn('contribute', 'ip')) {
            Schema::table('contribute', function (Blueprint $table) {
                $table->dropColumn('ip');
            });
        }

    }
}
