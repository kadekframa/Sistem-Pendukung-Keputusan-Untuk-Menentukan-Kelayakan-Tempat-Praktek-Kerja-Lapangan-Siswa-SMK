<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewBiodataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_biodata', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('users')->unsigned();
            $table->string('tahun_angkatan',20);
            $table->string('no_hp',15);
            $table->text('alamat');
            $table->string('tempat_lahir',255);
            $table->datetime('tgl_lahir');
            $table->integer('industri')->unsigned();
            $table->integer('status')->unsigned();

            $table->integer('kesesuaian_pekerjaan');
            $table->integer('fasilitas');
            $table->integer('durasi_bekerja');
            $table->integer('keaktifan_industri');
            $table->integer('status_penilaian')->unsigned();

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
            $table->foreign('industri')->references('id')->on('tb_industri')->onDelete('restrict');
            $table->foreign('status')->references('id')->on('tb_status')->onDelete('restrict');
            $table->foreign('status_penilaian')->references('id')->on('tb_statuspenilaian')->onDelete('restrict');

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
        Schema::table('tb_biodata', function (Blueprint $table) {
            //
        });
    }
}
