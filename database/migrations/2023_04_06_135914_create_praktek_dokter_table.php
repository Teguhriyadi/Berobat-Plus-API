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
        Schema::create('praktek_dokter', function (Blueprint $table) {
            $table->string("id_praktek")->primary();
            $table->string("id_dokter", 50);
            $table->string("id_keahlian", 50);
            $table->string("id_spesialis", 50);
            $table->string("id_rumah_sakit", 50);
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
        Schema::dropIfExists('praktek_dokter');
    }
};
