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
        Schema::create('spesialis_rumah_sakit', function (Blueprint $table) {
            $table->string("id_spesialis")->primary();
            $table->string("id_rumah_sakit", 50);
            $table->string("nama_spesialis", 100);
            $table->string("slug_spesialis");
            $table->string("logo")->nullable();
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
        Schema::dropIfExists('spesialis_rumah_sakit');
    }
};
