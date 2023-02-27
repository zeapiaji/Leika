<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'masyarakat',
        ]);
        Role::create([
            'name' => 'petugas',
        ]);
        Role::create([
            'name' => 'admin',
        ]);
    }
}
