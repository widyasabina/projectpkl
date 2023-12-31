<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalaiTable extends Migration
{
    public function up()
    {
        Schema::create('balai', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja', 255);
            $table->integer('kuota');
            $table->text('deskripsi')->nullable();
            $table->string('icon', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('balai');
    }
}
