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
        Schema::create('profil_apotek', function (Blueprint $table) {
            $table->string("id_profil_apotek", 50)->primary();
            $table->string("nama_apotek", 100);
            $table->string("slug_apotek");
            $table->text("deskripsi_apotek");
            $table->text("alamat_apotek");
            $table->string("nomor_hp", 30);
            $table->string("foto_apotek")->nullable();
            $table->tinyInteger("status");
            $table->string("id_user");
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
        Schema::dropIfExists('profil_apotek');
    }
};
