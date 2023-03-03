<?php

namespace App\Http\Controllers;

use App\Models\Mounting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;

class MountingController extends Controller
{
    public function unggah(Request $request)
    {
        DB::transaction(function () use($request){
            try {
                Mounting::create([
                    'nama' => $request->nama
                ]);
                Toastr::success('Berhasil', 'Data Berhasil Diperbarui!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Ditambahkan!');
                return back();
            }
        });

        return redirect()->route('data_pendukung');
    }

    public function edit($id)
    {
        $data = Mounting::findOrFail($id);
        return view('mounting.edit', compact('data'));
    }

    public function perbarui(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            try {
                $data = Mounting::findOrFail($id);
                $data->nama = $request->nama;
                $data->save();
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
                //code...
                $merek = Mounting::findOrFail($id);
                $merek->delete();
                Toastr::success('Berhasil', 'Data Berhasil Dihapus!');
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Dihapus, Hapus Data yang tersambung terlebih dahulu!');
                return back();
            }
        }); 

        return redirect()->route('data_pendukung');
    }
}
