<?php

namespace Database\Seeders;

use App\Models\Kamera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kamera::create([
            'shutter_count' => '2000',
            'tipe_sensor' => 'Full Frame 35 mmm, CMOS',
            'jumlah_piksel' => '61 MP',
            'baterai' => '1000 shots',
            'id_mounting' => 1,
        ]);

        Kamera::create([
            'shutter_count' => '5000',
            'tipe_sensor' => 'APS-C 15 mmm, CMOS',
            'jumlah_piksel' => '25 MP',
            'baterai' => '520 shots',
            'id_mounting' => 2,
        ]);

        Kamera::create([
            'shutter_count' => '0',
            'tipe_sensor' => 'Full Frame 35 mmm, CMOS',
            'jumlah_piksel' => '51 MP',
            'baterai' => '1200 shots',
            'id_mounting' => 3,
        ]);
    }
}
