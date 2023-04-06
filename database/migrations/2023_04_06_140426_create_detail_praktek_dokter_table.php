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
        Schema::create('detail_praktek_dokter', function (Blueprint $table) {
            $table->string("id_detail_praktek")->primary();
            $table->string("id_dokter");
            $table->string("id_rumah_sakit");
            $table->double("biaya_dokter");
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
        Schema::dropIfExists('detail_praktek_dokter');
    }
};
