<?php

namespace Database\Seeders;

use App\Models\Lensa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LensaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lensa::create([
            'focal_length' => '70-200mm',
            'aperture' => 'f/2.8 - f/4',
            'berat' => '250g',
            'id_mounting' => 2,
        ]);

        Lensa::create([
            'focal_length' => '200mm',
            'aperture' => 'f/2.8',
            'berat' => '400g',
            'id_mounting' => 1,
        ]);

        Lensa::create([
            'focal_length' => '24-70',
            'aperture' => 'f/1.8',
            'berat' => '150',
            'id_mounting' => 3,
        ]);
    }
}
