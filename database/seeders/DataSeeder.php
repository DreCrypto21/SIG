<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('datas')->insert([
            [
                'kecamatan' => 'Fatuleu',
                'jumlah_kasus' => 591,
                'info' => 'info-fatuleu',
                'latitude' => '-9.9975499',
                'longitude' => '123.9300209',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan' => 'Kupang Timur',
                'jumlah_kasus' => 576,
                'info' => 'ingo-kupang-timur',
                'latitude' => '-10.0880582',
                'longitude' => '123.7530685',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan' => 'Amarasi Barat',
                'jumlah_kasus' => 456,
                'info' => 'info-amarasi-barat',
                'latitude' => '-10.2953411',
                'longitude' => '123.6575829',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kecamatan' => 'Kupang Tengah',
                'jumlah_kasus' => 389,
                'info' => 'info-kupang-tengah',
                'latitude' => '-10.1358114',
                'longitude' => '123.6737537',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
