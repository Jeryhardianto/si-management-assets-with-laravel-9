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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi', 50);
            $table->string('id_peminjam', 50);
            $table->dateTime('tanggal_peminjaman');
            $table->dateTime('tanggal_pengembalian');
            $table->string('no_hp');
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
        Schema::dropIfExists('pinjaman');
    }
};
