<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
           'nama_lengkap' => 'admin',
           'username' => 'admin',
           'email' => 'admin@gmail.com',
           'password' => Hash::make('zeapiaji'),
           'telp' => '082115059769',
           'alamat' => '154 Dewayne Plains East Theresa, AR 51813-6151',
           'usia' => '50',
           'foto_profil' => 'images/pengguna/default.png',
        ]);
        
        $admin->assignRole('admin');

        $petugas = User::create([
            'nama_lengkap' => 'petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('zeapiaji'),
            'telp' => '1239824380',
            'alamat' => '154 Dewayne Plains East Theresa, AR 51813-6151',
            'usia' => '50',
            'foto_profil' => 'images/pengguna/default.png',
         ]);
         
         $petugas->assignRole('petugas');

         $masyarakat = User::create([
            'nama_lengkap' => 'masyarakat',
            'username' => 'masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => Hash::make('zeapiaji'),
            'telp' => '1237012370',
            'alamat' => '154 Dewayne Plains East Theresa, AR 51813-6151',
            'usia' => '50',
            'foto_profil' => 'images/pengguna/default.png',
         ]);
         
         $masyarakat->assignRole('masyarakat');

         $zeapiaji = User::create([
            'nama_lengkap' => 'zeapiaji',
            'username' => 'zeapiaji',
            'email' => 'zeapiaji@gmail.com',
            'password' => Hash::make('zeapiaji'),
            'telp' => '213701032132',
            'alamat' => '154 Dewayne Plains East Theresa, AR 51813-6151',
            'usia' => '50',
            'foto_profil' => 'images/pengguna/default.png',
         ]);
         
         $zeapiaji->assignRole('masyarakat');
    }
}
