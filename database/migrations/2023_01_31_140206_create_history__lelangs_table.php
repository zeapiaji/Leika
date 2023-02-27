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
        Schema::create('riwayat_lelang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lelang');
            $table->foreignId('id_barang');
            $table->foreignId('id_user');
            $table->bigInteger('penawaran_harga');
            $table->timestamps();

            $table->foreign('id_lelang')->references('id')->on('lelang');
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_lelang');
    }
};
