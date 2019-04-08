<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblbrgmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbrgmasuks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_nota')->unsigned();
            $table->date('tgl_masuk');
            $table->integer('id_distributor')->unsigned();
            $table->integer('id_petugas')->unsigned();
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblbrgmasuks');
    }
}
