<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_rc')->nullable();
            $table->unsignedBigInteger('id_stnk')->nullable();
            $table->timestamp('tgl_dpa')->nullable();
            $table->unsignedBigInteger('id_rak')->nullable();

            $table->foreign('id_rc')->references('id')->on('rc')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_stnk')->references('id')->on('stnk')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_rak')->references('id')->on('rak')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dpa');
    }
}
