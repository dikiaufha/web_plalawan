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
        Schema::create('kecamatan_excel', function (Blueprint $table) {
            $table->id('id_kecamatan_excel');
            $table->string('puskesmas');
            $table->integer('lakilaki');
            $table->integer('perempuan');
            $table->integer('total');
            $table->integer('rumah_tangga');
            $table->integer('luas_wilayah');
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
        Schema::dropIfExists('kecamatan_excel');
    }
};
