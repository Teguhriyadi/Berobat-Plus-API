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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string("id_transaksi", 50)->primary();
            $table->string("id_konsumen", 50);
            $table->string("nama_konsumen");
            $table->string("nomor_hp_konsumen");
            $table->tinyInteger("jenis_transaksi");
            $table->string("jasa_pengiriman", 50)->nullable();
            $table->string("pembayaran", 50);
            $table->double("total");
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
        Schema::dropIfExists('transaksi');
    }
};
