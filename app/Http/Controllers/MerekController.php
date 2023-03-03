<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kondisi;
use App\Models\Merek;
use App\Models\Mounting;
use Database\Factories\MerekFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class MerekController extends Controller
{
    public function index()
    {
        $merek    = Merek::orderBy('id', 'desc')->get();
        $kategori = Kategori::orderBy('id', 'desc')->get();
        $kondisi  = Kondisi::orderBy('id', 'desc')->get();
        $mounting = Mounting::orderBy('id', 'desc')->get();
        $no = 1;
        
        return view('merek.index', compact('merek', 'kategori', 'kondisi', 'mounting', 'no'));
    }

    public function unggah(Request $request)
    {
        DB::transaction(function () use($request){
            Merek::create([
                'nama' => $request->nama
            ]);
        });

        return redirect()->route('data_pendukung');
    }

    public function edit($id)
    {
        $data = Merek::findOrFail($id);
        return view('merek.edit', compact('data'));
    }

    public function perbarui(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            try {
                $merek = Merek::findOrFail($id);
                $merek->nama = $request->nama;
                $merek->save();
                Toastr::success('Berhasil', 'Data Berhasil Diperbarui!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Diperbarui!');
            }
        });

        return redirect()->route('data_pendukung');
    }

    public function hapus($id)
    {
        DB::transaction(function () use($id){
            try {
                $merek = Merek::findOrFail($id);
                $merek->delete();
                Toastr::success('Berhasil', 'Data Berhasil Dihapus!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Dihapus, Hapus Data yang tersambung terlebih dahulu!');
            }
        }); 

        return redirect()->route('data_pendukung');
    }
}
