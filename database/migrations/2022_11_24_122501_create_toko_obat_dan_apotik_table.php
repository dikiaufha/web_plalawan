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
        Schema::create('toko_obat_dan_apotik', function (Blueprint $table) {
            $table->id('id_usaha');
            $table->string('nama_tempat_usaha');
            $table->string('bidang_usaha');
            $table->string('alamat');
            $table->string('apoteker');
            $table->string('defunct_ind');
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
        Schema::dropIfExists('toko_obat_dan_apotik');
    }
};
