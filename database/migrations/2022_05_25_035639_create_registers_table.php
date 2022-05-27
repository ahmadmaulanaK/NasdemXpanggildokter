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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('noreg')->unique();
            $table->string('name');
            $table->string('lokasi');
            $table->string('waktu');
            $table->string('whatsapp');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('rw');
            $table->string('rt');
            $table->string('jenis_kelamin');
            $table->string('layanan');
            $table->string('riwayat_penyakit');
            $table->boolean('isActive')->default(0)->comment('0: new, 1: confirm, 2: process,  3: done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
};
