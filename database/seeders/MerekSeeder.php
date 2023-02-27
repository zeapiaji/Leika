<?php

namespace Database\Seeders;

use App\Models\Merek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merek::create([
            'nama' => 'Sony'
        ])->create([
            'nama' => 'Fujifilm'
        ])->create([
            'nama' => 'Nikon'
        ])->create([
            'nama' => 'Canon'
        ])->create([
            'nama' => 'Pentax'
        ])->create([
            'nama' => 'Olympus'
        ]);
    }
}
