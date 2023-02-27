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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->foreignId('id_merek');
            $table->date('tanggal_rilis');
            $table->foreignId('id_kondisi');
            $table->foreignId('id_kategori');
            $table->text('deskripsi');
            $table->foreignId('id_kamera')->nullable();
            $table->foreignId('id_lensa')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('id_merek')->references('id')->on('merek');
            $table->foreign('id_kondisi')->references('id')->on('kondisi');
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->foreign('id_kamera')->references('id')->on('kamera');
            $table->foreign('id_lensa')->references('id')->on('lensa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
