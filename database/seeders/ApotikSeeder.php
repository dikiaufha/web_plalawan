<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ApotikModel;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ApotikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 20; $i++) {
            ApotikModel::create([
                'name_apotik' => $faker->name,
                'alamat_apotik' => $faker->address,
                'bidang_usaha' => $faker->company,
                'apoteker' => $faker->name,
                'defunct_ind' => 'N',
            ]);
        }
    }
}
