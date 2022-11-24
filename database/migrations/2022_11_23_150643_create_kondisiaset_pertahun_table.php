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
        Schema::create('kondisiaset_pertahun', function (Blueprint $table) {
            $table->id('id_kondisiaset_pertahun');
            $table->year('tahun');
            $table->integer('baik');
            $table->integer('rusak_ringan');
            $table->integer('rusak_berat');
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
        Schema::dropIfExists('kondisiaset_pertahun');
    }
};
