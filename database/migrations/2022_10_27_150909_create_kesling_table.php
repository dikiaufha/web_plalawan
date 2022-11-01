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
        Schema::create('kesling', function (Blueprint $table) {
            $table->id('id_kesling');
            $table->foreignId('id_puskesmas')->nullable($value = true);
            $table->year('tahun')->nullable($value = true);
            $table->date('triwulan')->nullable($value = true);
            $table->integer('lingkungan', 10)->nullable($value = true);
            $table->integer('penduduk', 10)->nullable($value = true);
            $table->integer('kepala_keluarga', 10)->nullable($value = true);
            $table->integer('air_minum_dibina', 10)->nullable($value = true);
            $table->integer('air_minum_ms', 10)->nullable($value = true);
            $table->integer('jamban_dibina', 10)->nullable($value = true);
            $table->integer('jamban_ms', 10)->nullable($value = true);
            $table->integer('jamban_kk_sehat', 10)->nullable($value = true);
            $table->char('defunct_ind', 1);
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
        Schema::dropIfExists('kesling');
    }
};
