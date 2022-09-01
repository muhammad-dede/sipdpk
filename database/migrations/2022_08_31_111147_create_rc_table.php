<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stnk')->nullable();
            $table->timestamp('tgl_akhir_pkb')->nullable();

            $table->foreign('id_stnk')->references('id')->on('stnk')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rc');
    }
}
