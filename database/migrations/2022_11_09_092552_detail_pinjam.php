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
        Schema::create('detail_pinjaman', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi', 50);
            $table->string('kode_asset', 50);
            $table->string('id_asset', 50);
            $table->string('jumlah', 5);
            $table->text('keterangan');
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
        Schema::dropIfExists('detail_pinjaman');
    }
};
