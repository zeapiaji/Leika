<?php

namespace Database\Seeders;

use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <= 20 ; $i++) { 
            Barang::create([
                'nama_barang' => 'Sony A7RV',
                'id_merek' => 1,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 1,
                'id_kategori' => 1,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => 1,
                'id_lensa' => null
            ]);
            Barang::create([
                'nama_barang' => 'Fujifilm XT-100',
                'id_merek' => 2,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 3,
                'id_kategori' => 1,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => 2,
                'id_lensa' => null
            ]);
            Barang::create([
                'nama_barang' => 'Canon R3',
                'id_merek' => 4,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 2,
                'id_kategori' => 1,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => 3,
                'id_lensa' => null
            ]);
            Barang::create([
                'nama_barang' => 'Nikon AF-S 70-200mm',
                'id_merek' => 4,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 1,
                'id_kategori' => 6,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => null,
                'id_lensa' => 1
            ]);
            Barang::create([
                'nama_barang' => 'Sony FE 200mm',
                'id_merek' => 1,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 4,
                'id_kategori' => 6,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => null,
                'id_lensa' => 2
            ]);
            Barang::create([
                'nama_barang' => 'Canon RF 24-70mm',
                'id_merek' => 1,
                'tanggal_rilis' => Carbon::now(),
                'id_kondisi' => 2,
                'id_kategori' => 6,
                'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut ex eu nulla bibendum lacinia sed at turpis. Duis consectetur lacinia risus scelerisque venenatis. Duis cursus hendrerit mi, sodales suscipit lacus. Suspendisse at feugiat tortor, quis pretium quam. Aliquam consectetur metus ac dui tempus consectetur. Vivamus euismod ipsum sed leo dictum, et faucibus diam varius. Morbi quis eros tortor. Morbi tristique, ipsum at efficitur pharetra, enim velit consectetur ipsum, at iaculis diam mauris quis velit. Donec vitae urna tortor. Praesent scelerisque diam ac imperdiet volutpat. Donec eget mi ac magna iaculis aliquet sed non tortor. In eros magna, lobortis a nibh in, aliquet tincidunt turpis. In in tincidunt eros, quis interdum nunc. Nam accumsan eget felis sit amet sagittis. Quisque lobortis mattis enim, quis molestie orci cursus eget. Nullam gravida at lacus quis pulvinar.',
                'id_kamera' => null,
                'id_lensa' => 3
            ]);
        }
    }
}
