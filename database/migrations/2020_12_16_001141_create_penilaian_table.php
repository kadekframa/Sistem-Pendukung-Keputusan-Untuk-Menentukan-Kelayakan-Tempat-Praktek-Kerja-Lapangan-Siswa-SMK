<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penilaian', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('users')->unsigned();
            $table->integer('kesesuaian_pekerjaan');
            $table->integer('fasilitas');
            $table->integer('durasi_bekerja');
            $table->integer('keaktifan_industri');

            $table->integer('bobot_k1');
            $table->integer('bobot_k2');
            $table->integer('bobot_k3');
            $table->integer('bobot_k4');

            $table->string('k1',60);
            $table->string('k2',60);
            $table->string('k3',60);
            $table->string('k4',60);
            
            $table->timestamps();

            $table->foreign('users')->references('id')->on('users')->onDelete('restrict');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_penilaian', function (Blueprint $table) {
            //
        });
    }
}
