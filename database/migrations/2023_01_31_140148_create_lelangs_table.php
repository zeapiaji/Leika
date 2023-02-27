<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang');
            $table->string('harga_awal');
            $table->bigInteger('kelipatan_harga');
            $table->bigInteger('harga_tertinggi');
            $table->foreignId('id_petugas');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_petugas')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lelang');
    }
};
