<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranMagangTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_magang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->bigInteger('magang_id')->unsigned();
            $table->date('tanggal_pendaftaran');
            $table->string('status_pendaftaran', 20);            
            $table->string('file_kesbangpol', 255)->nullable();
            $table->string('file_proposal', 255)->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('magang_id')->references('id')->on('magang');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_magang');
    }
}
