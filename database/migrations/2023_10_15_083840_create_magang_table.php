<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagangTable extends Migration
{
    public function up()
    {
        Schema::create('magang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_balai');
            $table->text('deskripsi')->nullable();
            $table->date('deadline_pendaftaran');
            $table->timestamps();

            $table->foreign('id_balai')->references('id')->on('balai');
        });
    }

    public function down()
    {
        Schema::dropIfExists('magang');
    }
}
