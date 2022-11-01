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
<<<<<<< HEAD:database/migrations/2022_10_31_135909_create_tb_customer_tabel.php
        Schema::create('tb_customer_tabel', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name');
            $table->string('contact_name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
=======
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_akun');
            $table->string('nama_akun');
            $table->string('password');
            $table->foreignId('id_jabatan')->nullable();
            $table->foreignId('id_pengguna')->nullable();
            $table->char('defunct_ind', 1);
>>>>>>> 4cb1fbfb6331e6197164c1159e4d67715b6a6a8b:database/migrations/2014_10_12_000000_create_users_table.php
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
        Schema::dropIfExists('tb_customer_tabel');
    }
};
