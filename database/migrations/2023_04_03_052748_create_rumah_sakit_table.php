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
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->string("id_rumah_sakit")->primary();
            $table->integer("id_user");
            $table->string("nama_rs", 100);
            $table->string("slug_rs");
            $table->text("deskripsi_rs");
            $table->enum("kategori_rs", [1, 0]);
            $table->string("alamat_rs");
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
        Schema::dropIfExists('rumah_sakit');
    }
};
