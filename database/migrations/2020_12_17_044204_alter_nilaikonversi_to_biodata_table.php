<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNilaikonversiToBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_biodata', function (Blueprint $table) {
            $table->integer('nilaik1');
            $table->integer('nilaik2');
            $table->integer('nilaik3');
            $table->integer('nilaik4');

            $table->float('normalk1');
            $table->float('normalk2');
            $table->float('normalk3');
            $table->float('normalk4');

            $table->float('endk1');
            $table->float('endk2');
            $table->float('endk3');
            $table->float('endk4');

            $table->float('results');
            $table->string('kategori',20);
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
