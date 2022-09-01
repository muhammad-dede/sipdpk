<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rak', function (Blueprint $table) {
            $table->id();
            $table->char('kode', 12)->nullable();
            $table->char('no', 12)->nullable();
            $table->char('box', 12)->nullable();
            $table->char('baris', 12)->nullable();
            $table->unsignedBigInteger('id_lokasi')->nullable();

            $table->foreign('id_lokasi')->references('id')->on('lokasi')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rak');
    }
}
