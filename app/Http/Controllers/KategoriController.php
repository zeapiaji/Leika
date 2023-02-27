<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class KategoriController extends Controller
{
    public function unggah(Request $request)
    {
        DB::transaction(function () use($request){
            Kategori::create([
                'nama' => $request->nama,
                'status' => 0,
            ]);
        });

        return redirect()->route('data_pendukung');
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('kategori.edit', compact('data'));
    }

    public function perbarui(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            $data = Kategori::findOrFail($id);
            $data->nama = $request->nama;
            $data->save();
        });

        return redirect()->route('data_pendukung');
    }

    public function hapus($id)
    {
        DB::transaction(function () use($id){
            try {
                //code...
                $merek = Kategori::findOrFail($id);
                $merek->delete();
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Dihapus, Hapus Data yang tersambung terlebih dahulu!');
            }
        }); 

        return redirect()->route('data_pendukung');
    }
}
