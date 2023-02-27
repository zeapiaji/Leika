<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama' => 'DSLR',
            'status' => '1',
        ])->create([
            'nama' => 'Mirrorles',
            'status' => '1',
        ])->create([
            'nama' => 'Analog/Film',
            'status' => '1',
        ])->create([
            'nama' => 'SLR',
            'status' => '1',
        ])->create([
            'nama' => 'Action Cam',
            'status' => '1',
        ])->create([
            'nama' => 'Telephoto',
            'status' => '0',
        ])->create([
            'nama' => 'Macro',
            'status' => '0',
        ])->create([
            'nama' => 'Wide',
            'status' => '0',
        ])->create([
            'nama' => 'Tilt',
            'status' => '0',
        ]);
    }
}
