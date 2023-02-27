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
        Schema::create('kamera', function (Blueprint $table) {
            $table->id();
            $table->string('shutter_count');
            $table->string('tipe_sensor');
            $table->string('jumlah_piksel');
            $table->string('baterai');
            $table->foreignId('id_mounting');
            $table->timestamps();

            $table->foreign('id_mounting')->references('id')->on('mounting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamera');
    }
};
