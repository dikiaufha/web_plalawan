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
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->id('id_puskesmas');
            $table->string('nama_puskesmas')->nullable($value = true);
            $table->foreignId('id_provinsi')->nullable($value = true);
            $table->foreignId('id_kabkota')->nullable($value = true);
            $table->string('alamat', 200)->nullable($value = true);
            $table->string('telp', 200)->nullable($value = true);
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
        Schema::dropIfExists('puskesmas');
    }
};
