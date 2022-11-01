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
        Schema::create('kia', function (Blueprint $table) {
            $table->id('id_kia');
            $table->foreignId('id_puskesmas')->nullable($value = true);
            $table->year('tahun')->nullable($value = true);
            $table->date('bulan')->nullable($value = true);
            $table->integer('penduduk', 10)->nullable($value = true);
            $table->integer('bumil', 10)->nullable($value = true);
            $table->integer('buku_kia', 10)->nullable($value = true);
            $table->integer('k1', 10)->nullable($value = true);
            $table->integer('k4', 10)->nullable($value = true);
            $table->integer('bumil_t1', 10)->nullable($value = true);
            $table->integer('bumil_t2', 10)->nullable($value = true);
            $table->integer('bumil_t3', 10)->nullable($value = true);
            $table->integer('bumil_t4', 10)->nullable($value = true);
            $table->integer('bumil_t5', 10)->nullable($value = true);
            $table->integer('bumil_t2plus', 10)->nullable($value = true);
            $table->integer('fe1', 10)->nullable($value = true);
            $table->integer('fe3', 10)->nullable($value = true);
            $table->integer('resiko_nakes', 10)->nullable($value = true);
            $table->integer('resiko_masyarakat', 10)->nullable($value = true);
            $table->integer('risti_maternal', 10)->nullable($value = true);
            $table->integer('risti_neonatal', 10)->nullable($value = true);
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
        Schema::dropIfExists('kia');
    }
};
