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
        Schema::create('desa_excel', function (Blueprint $table) {
            $table->id('id_desa_excel');
            $table->string('desa');
            $table->integer('lakilaki');
            $table->integer('perempuan');
            $table->integer('total');
            $table->integer('rumah_tangga')->nullable();
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
        Schema::dropIfExists('desa_excel');
    }
};
