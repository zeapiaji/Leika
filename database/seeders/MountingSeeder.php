<?php

namespace Database\Seeders;

use App\Models\Mounting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MountingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mounting::create([
            'nama' => 'E-Mount'
        ])->create([
            'nama' => 'F-Mount'
        ])->create([
            'nama' => 'RF'
        ]);
    }
}
