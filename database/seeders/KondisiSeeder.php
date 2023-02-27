<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kondisi::create([
            'nama' => 'Sangat Baik'
        ])->create([
            'nama' => 'Baik'
        ])->create([
            'nama' => 'Cukup'
        ])->create([
            'nama' => 'Rusak'
        ]);
    }
}
