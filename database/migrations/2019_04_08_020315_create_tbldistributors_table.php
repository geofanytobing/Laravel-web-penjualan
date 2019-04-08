<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbldistributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldistributors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_distributor')->unsigned();
            $table->string('nama_distributor');
            $table->text('alamat');
            $table->string('kota_asal');
            $table->string('email');
            $table->integer('telepon');
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
        Schema::dropIfExists('tbldistributors');
    }
}
