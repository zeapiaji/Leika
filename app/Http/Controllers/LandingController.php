<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\Penawaran;
use App\Models\FotoBarang;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class LandingController extends Controller
{
    public function index()
    {
        
        $data = Lelang::where('status', 1)->orderBy('id', 'desc')->paginate(9);
        $selesai_lelang = Lelang::where('status', 2)->orderBy('id', 'desc')->paginate(9);
        
        return view('landing_page', compact('data', 'selesai_lelang'));
    }

    public function lihat_lelang($id)
    {
        try {
            $data = Lelang::with('barang')->where('id_barang', $id)->first();
            $lelang_lainya = Lelang::with('barang')->where('status', 1)->whereNotIn('id', [$data->id])->get();
            $foto_utama = FotoBarang::where('id_barang', $id)->first();
            $penawaran = Penawaran::with('user')->where('id_lelang', $data->id)->orderBy('harga_penawaran', 'desc')->limit(5)->get();
        } catch (\Throwable $th) {
            Toastr::error('Gagal Masuk Lelang','Lelang Tidak Ditemukan!');
            return back();
        }

        return view('lelang.lihat_lelang', compact('data', 'lelang_lainya','foto_utama', 'penawaran'));
    }
}
