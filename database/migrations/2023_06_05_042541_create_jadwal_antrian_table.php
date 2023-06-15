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
        Schema::create('jadwal_antrian', function (Blueprint $table) {
            $table->string("id_jadwal_antrian", 50)->primary();
            $table->string("konsumen_id", 50);
            $table->string("id_jadwal_praktek", 50);
            $table->tinyInteger("nomer_antrian");
            $table->enum("status", ["1", "0"]);
            $table->date("tanggal");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_antrian');
    }
};
