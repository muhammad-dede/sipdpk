<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStnkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stnk', function (Blueprint $table) {
            $table->id();
            $table->char('nopol', 12)->nullable();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamp('tgl_awal_pkb')->nullable();
            $table->unsignedBigInteger('id_samsat')->nullable();

            $table->foreign('id_samsat')->references('id')->on('samsat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stnk');
    }
}
