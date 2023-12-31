<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenelitianTable extends Migration
{
    public function up()
    {
        Schema::create('penelitian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_balai')->unsigned();
            $table->string('judul', 255);
            $table->text('deskripsi')->nullable();
            $table->date('deadline_pendaftaran');
            $table->timestamps();

            $table->foreign('id_balai')->references('id')->on('balai');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penelitian');
    }
}
