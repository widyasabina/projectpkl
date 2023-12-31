<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('nim', 10);
            $table->string('instansi', 255)->nullable();
            $table->string('program_studi', 50)->nullable();
            $table->integer('semester');
            $table->string('alamat', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('no_telepon', 15)->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswa');
    }
}
