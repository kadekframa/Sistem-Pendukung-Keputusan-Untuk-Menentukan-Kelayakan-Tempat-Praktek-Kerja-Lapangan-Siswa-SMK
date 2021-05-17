<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_seleksi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa')->unsigned();
            $table->integer('tahun_angkatan')->unsigned();
            $table->integer('industri')->unsigned();
            $table->string('kesesuaian_pekerjaan', 20);
            $table->string('fasilitas', 20);
            $table->string('durasi_bekerja', 20);
            $table->string('keaktifan_industri', 20);
            $table->integer('bobot')->unsigned();
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('siswa')->references('id')->on('tb_siswa')->onDelete('restrict');
            $table->foreign('tahun_angkatan')->references('id')->on('tb_siswa')->onDelete('restrict');
            $table->foreign('industri')->references('id')->on('tb_industri')->onDelete('restrict');
            $table->foreign('bobot')->references('id')->on('tb_bobotkriteria')->onDelete('restrict');
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
        Schema::table('tb_seleksi', function (Blueprint $table) {
            //
        });
    }
}
