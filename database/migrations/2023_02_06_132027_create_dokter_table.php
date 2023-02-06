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
        Schema::create('dokter', function (Blueprint $table) {
            $table->string("id_dokter", 50)->primary();
            $table->integer("user_id");
            $table->string("jabatan", 50);
            $table->string("pendidikan_terakhir", 50);
            $table->string("praktik_di", 50);
            $table->string("nomor_str", 50);
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
        Schema::dropIfExists('dokter');
    }
};
