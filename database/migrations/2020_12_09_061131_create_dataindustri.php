<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataindustri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_industri', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('nama_industri',300);
            $table -> text('alamat');
            $table -> string('no_telepon');
            $table -> timestamps();

            $table ->engine ='InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_industri', function (Blueprint $table) {
            //
        });
    }
}
