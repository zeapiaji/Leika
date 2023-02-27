<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\FotoBarang;
use App\Models\Kamera;
use App\Models\Petugas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
            // Parent
            RoleSeeder::class,
            MerekSeeder::class,
            KondisiSeeder::class,
            KategoriSeeder::class,
            MountingSeeder::class,
            // Item
            LensaSeeder::class,
            KameraSeeder::class,
            BarangSeeder::class,
            UserSeeder::class,
        ]);
        \App\Models\User::factory(25)->create();
    }
}
