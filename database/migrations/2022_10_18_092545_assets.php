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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuan_id', 5)->nullable();
            $table->foreignId('golongan_id', 5)->nullable();
            $table->foreignId('kategori_id', 5)->nullable();
            $table->string('kode_asset', 25)->nullable();
            $table->string('lokasi', 150)->nullable();
            $table->string('nama_asset')->nullable();
            $table->string('harga')->nullable();
            $table->string('jumlah', 5)->nullable();
            $table->string('masa', 2)->nullable();
            $table->string('gambar')->nullable();
            $table->string('kondisi', 15)->nullable();
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
        Schema::dropIfExists('assets');
    }
};
