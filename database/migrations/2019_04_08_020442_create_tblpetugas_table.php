<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpetugas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_petugas')->unsigned();
            $table->string('nama_petugas');
            $table->text('alamat');
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
        Schema::dropIfExists('tblpetugas');
    }
}
