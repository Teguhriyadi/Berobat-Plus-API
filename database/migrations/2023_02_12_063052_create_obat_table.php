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
        Schema::create('obat', function (Blueprint $table) {
            $table->string("id_obat", 50)->primary();
            $table->string("nama_obat");
            $table->double("harga");
            $table->text("deskripsi");
            $table->string("apotek_id", 50);
            $table->string("foto")->nullable();
            $table->string("nama_supplier");
            $table->string("asal_supplier");
            $table->string("golongan_obat_id", 50);
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
        Schema::dropIfExists('obat');
    }
};
