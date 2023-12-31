<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranPenelitianTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_penelitian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->bigInteger('penelitian_id')->unsigned();
            $table->date('tanggal_pendaftaran');
            $table->string('status_pendaftaran', 20);            
            $table->string('file_kesbangpol', 255)->nullable();
            $table->string('file_proposal', 255)->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('penelitian_id')->references('id')->on('penelitian');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_penelitian');
    }
}
