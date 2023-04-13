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
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->string("id_gejala_penyakit", 50)->primary();
            $table->string('gejala_id', 50);
            $table->string('penyakit_id', 50);
            $table->float("value_cf")->nullable();
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
        Schema::dropIfExists('gejala_penyakit');
    }
};
