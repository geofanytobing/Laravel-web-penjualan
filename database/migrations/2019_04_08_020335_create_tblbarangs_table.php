<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblbarangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kode_barang')->unsigned();
            $table->string('nama_barang');
            $table->integer('kode_jenis');
            $table->string('harga_net');
            $table->string('harga_jual');
            $table->integer('stok');
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
        Schema::dropIfExists('tblbarangs');
    }
}
