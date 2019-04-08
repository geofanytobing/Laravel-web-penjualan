<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpenjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_faktur')->unsigned();
            $table->date('tgl_penjualan');
            $table->integer('id_petugas')->unsigned();
            $table->string('bayar');
            $table->integer('sisa');
            $table->integer('total');
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
        Schema::dropIfExists('tblpenjualans');
    }
}
