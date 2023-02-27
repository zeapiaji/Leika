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
            Kondisi::create([
                'nama' => $request->nama
            ]);
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
            $Kondisi = Kondisi::findOrFail($id);
            $Kondisi->nama = $request->nama;
            $Kondisi->save();
        });

        return redirect()->route('data_pendukung');
    }

    public function hapus($id)
    {
        DB::transaction(function () use($id){
            try {
                $Kondisi = Kondisi::findOrFail($id);
                $Kondisi->delete();
                //code...
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Data Gagal Dihapus, Hapus Data yang tersambung terlebih dahulu!');
            }
        }); 

        return redirect()->route('data_pendukung');
    }
}
