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
        Schema::create('datadasar', function (Blueprint $table) {
            $table->id('id_datadasar');
            $table->year('tahun')->nullable($value = true);
            $table->foreignId('id_puskesmas')->nullable($value = true);
            $table->integer('lingkungan', 10)->nullable($value = true);
            $table->integer('penduduk', 10)->nullable($value = true);
            $table->integer('rumah', 10)->nullable($value = true);
            $table->integer('kepala_keluarga', 10)->nullable($value = true);
            $table->integer('bumil', 10)->nullable($value = true);
            $table->integer('bulin', 10)->nullable($value = true);
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
        Schema::dropIfExists('datadasar');
    }
};
