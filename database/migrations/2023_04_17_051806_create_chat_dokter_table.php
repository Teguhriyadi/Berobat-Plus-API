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
        Schema::create('chat_dokter', function (Blueprint $table) {
            $table->string("id_chat_dokter", 50)->primary();
            $table->string("id_dokter", 50);
            $table->string("uid_partner", 100);
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
        Schema::dropIfExists('chat_dokter');
    }
};
