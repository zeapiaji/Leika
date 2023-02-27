<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\FotoBarang;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = Lelang::where('status', 1)->orderBy('id', 'desc')->paginate(9);

        return view('landing_page', compact('data'));
    }

    public function lihat_lelang($id)
    {
        $data = Lelang::with('barang')->where('id_barang', $id)->first();
        $lelang_lainya = Lelang::with('barang')->whereNotIn('id', [$data->id])->get();
        $foto_utama = FotoBarang::where('id_barang', $id)->first();

        return view('lelang.lihat_lelang', compact('data', 'lelang_lainya','foto_utama'));
    }
}
