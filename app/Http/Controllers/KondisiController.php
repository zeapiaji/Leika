<?php

namespace App\Http\Controllers;

use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class KondisiController extends Controller
{
     public function unggah(Request $request)
    {
        DB::transaction(function () use($request){
            try {
                Kondisi::create([
                    'nama' => $request->nama
                ]);
                Toastr::success('Berhasil', 'Data Berhasil Ditambahkan!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Ditambahkan!');
                return back();
            }
        });

        return redirect()->route('data_pendukung');
    }

    public function edit($id)
    {
        $data = Kondisi::findOrFail($id);
        return view('kondisi.edit', compact('data'));
    }

    public function perbarui(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            try {
                $Kondisi = Kondisi::findOrFail($id);
                $Kondisi->nama = $request->nama;
                $Kondisi->save();
                Toastr::success('Berhasil', 'Data Berhasil Diperbarui!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Diperbarui!');
                return back();
            }
        });

        return redirect()->route('data_pendukung');
    }

    public function hapus($id)
    {
        DB::transaction(function () use($id){
            try {
                $Kondisi = Kondisi::findOrFail($id);
                $Kondisi->delete();
                Toastr::success('Berhasil', 'Data Berhasil Dihapus!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Dihapus, Hapus Data yang tersambung terlebih dahulu!');
                return back();
            }
        }); 

        return redirect()->route('data_pendukung');
    }
}
