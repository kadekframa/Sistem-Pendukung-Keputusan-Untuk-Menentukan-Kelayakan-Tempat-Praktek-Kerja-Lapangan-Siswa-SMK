<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNewKriteriaToTbBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_biodata', function (Blueprint $table) {
            $table->integer('penggunaan_bhsinggris')->after('keaktifan_industri')->nullable();

            $table->integer('bobot_k5')->after('bobot_k4')->nullable();

            $table->string('k5',60)->after('k4')->nullable();

            $table->integer('nilaik5')->after('nilaik4')->nullable();

            $table->float('normalk5')->after('normalk4')->nullable();

            $table->float('endk5')->after('endk4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_biodata', function (Blueprint $table) {
            //
        });
    }
}
