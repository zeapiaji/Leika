<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use App\Models\Penawaran;
use App\Models\FotoBarang;
use Illuminate\Http\Request;
use App\Models\Riwayat_Lelang;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lelang::orderBy('id', 'desc')->where('status', 1)->paginate(9);

        return view('lelang.guest', compact('data'));
    }

    public function lelang()
    {
        $data = Barang::with('lelang')->orderBy('id', 'desc')->paginate(9);
        $no = 1;

        return view('lelang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lelang_barang($id)
    {
        $data = Barang::find($id);
        $foto_utama = FotoBarang::where('id_barang', $data->id)->first();
        return view('lelang.buka', compact('data', 'foto_utama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function buka_lelang(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            $lelang = Lelang::where('id_barang', $id)->first();
            if(isset($lelang)){
                $lelang->update([
                    'id_barang' => $id,
                    'harga_awal' => $request->harga_awal,
                    'kelipatan_harga' => $request->kelipatan_harga,
                    'harga_tertinggi' => 0,
                    'id_petugas' => Auth::user()->id,
                    'status' => 1,
                ]);
                return redirect()->route('lelang');        
            }else{
                Lelang::create([
                    'id_barang' => $id,
                    'harga_awal' => $request->harga_awal,
                    'kelipatan_harga' => $request->kelipatan_harga,
                    'harga_tertinggi' => 0,
                    'id_petugas' => Auth::user()->id,
                    'status' => 1,
                ]);
            }
            Toastr::success('Berhasil', 'Lelang Berhasil Dibuka!', ['timeOut' => 5000]);
        });
        return redirect()->route('lelang');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tutup_lelang($id)
    {
        $lelang = Lelang::where('id_barang',$id)->first();
        DB::transaction(function () use($lelang){
            $lelang->update([
                'status' => 0 //Status 2 = Sudah dihapus dari lelang
            ]);
            Toastr::success('Berhasil', 'Lelang Berhasil Ditutup!', ['timeOut' => 5000]);
        });

        return redirect()->route('lelang');
    }

    public function akhiri_lelang($id)
    {
        DB::transaction(function () use($id){
            $lelang = Lelang::where('id_barang', $id)->first();
            $penawaran = Penawaran::where('harga_penawaran', $lelang->harga_tertinggi)->first();
            try {
                //code...
                $riwayat_lelang = Riwayat_Lelang::create([
                    'id_barang' => $lelang->id_barang,
                    'id_lelang' => $lelang->id,
                    'id_user' => $penawaran->id_user,
                    'penawaran_harga' => $penawaran->harga_penawaran,
                ]);
                $lelang->update([
                    'status' => 2,
                ]);
                $penawaran_all = Penawaran::whereNotIn('id', [$penawaran->id])->delete();
                Toastr::success('Berhasil', 'Lelang Berhasil Diakhiri!', ['timeOut' => 5000]);
            } catch (\Throwable $th) {
                Toastr::error('Gagal', 'Lelang Gagal Diakhiri, Tidak ada penawar!', ['timeOut' => 5000]);
            }

        });

        return redirect()->back();
    }

    public function bid($id)
    {
        $lelang = Lelang::find($id);
        DB::transaction(function () use($id, $lelang){ 
            if ($lelang->harga_tertinggi == 0) {
                $bid = Penawaran::create([
                 'id_user' => Auth::user()->id,
                 'id_lelang' => $id,
                 'harga_penawaran' => $lelang->harga_awal
                ]);
                $lelang->update([
                    'harga_tertinggi' => $bid->harga_penawaran,
                ]);
            }else{
                $penawaran_tertinggi = $lelang->harga_tertinggi;
                $kelipatan_harga = $lelang->kelipatan_harga;
                $harga_penawaran = $penawaran_tertinggi + $kelipatan_harga;

                $bid = Penawaran::create([
                    'id_user' => Auth::user()->id,
                    'id_lelang' => $id,
                    'harga_penawaran' => $harga_penawaran
                ]);
                $lelang->update([
                    'harga_tertinggi' => $harga_penawaran
                ]);
            }
            Toastr::success('Berhasil', 'Anda Berhasil Melakukan Penawaran!', ['timeOut' => 5000]);
        });

        return redirect()->back();
    }
}
