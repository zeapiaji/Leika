<?php

namespace App\Http\Controllers;

use App\Models\Lensa;
use App\Models\Merek;
use App\Models\Barang;
use App\Models\Kamera;
use App\Models\Lelang;
use App\Models\Kondisi;
use App\Models\Kategori;
use App\Models\Mounting;
use App\Models\FotoBarang;
use Illuminate\Http\Request;
use App\Exports\ExportBarang;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Requests\LensaRequest;
use App\Http\Requests\KameraRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
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
        $data = Barang::orderBy('id', 'desc')->get();
        $no = 1;

        return view('barang.index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unggah_kamera(KameraRequest $request)
    {
        DB::transaction(function () use($request){
            $kamera = Kamera::create([
                'shutter_count' => $request->shutter_count,
                'tipe_sensor' => $request->tipe_sensor,
                'jumlah_piksel' => $request->jumlah_piksel,
                'baterai' => $request->baterai,
                'id_mounting' => $request->mounting,
            ]);
    
            $barang = Barang::create([
                'nama_barang' => $request->nama_barang,
                'id_kondisi' => $request->kondisi,
                'id_kategori' => $request->kategori,
                'id_merek' => $request->merek,
                'tanggal_rilis' => $request->tanggal_rilis,
                'deskripsi' => $request->deskripsi,
                'id_kamera' => $kamera->id,
                'id_lensa' => null
            ]);
    
            $id = $barang->id;
            $this->tambah_gambar($request->file('gambar_produk'), $id);

            Toastr::success('Berhasil', 'Data Berhasil Ditambahkan!', ['timeOut' => 5000]);
        });
        
        return redirect()->route('index');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unggah_lensa(LensaRequest $request)
    {
        // dd($request->focal_length);
        DB::transaction(function () use($request){
            $lensa = Lensa::create([
                'focal_length' => $request->focal_length,
                'aperture' => $request->aperture,
                'berat' => $request->berat,
                'id_mounting' => $request->mounting,
            ]);
    
            $barang = Barang::create([
                'nama_barang' => $request->nama_barang,
                'id_kondisi' => $request->kondisi,
                'id_kategori' => $request->kategori,
                'id_merek' => $request->merek,
                'tanggal_rilis' => $request->tanggal_rilis,
                'deskripsi' => $request->deskripsi,
                'id_kamera' => null,
                'id_lensa' => $lensa->id
            ]);
    
            $id = $barang->id;
            $this->tambah_gambar($request->file('gambar_produk'), $id);
            Toastr::success('Berhasil', 'Data Berhasil Ditambahkan!', ['timeOut' => 5000]);
        });
        
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah_kamera()
    {
        $kondisi = Kondisi::all();
        $kategori = Kategori::where('status', 1)->get();
        $merek = Merek::all();
        $mounting = Mounting::all();

        return view('barang.tambah_kamera', compact('kondisi', 'kategori', 'merek', 'mounting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah_lensa()
    {
        $kondisi = Kondisi::all();
        $kategori = Kategori::where('status', 0)->get();
        $merek = Merek::all();
        $mounting = Mounting::all();

        return view('barang.tambah_lensa', compact('kondisi', 'kategori', 'merek', 'mounting'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function detail(Barang $barang, $id)
    {
        $data = Barang::find($id);
        $foto_utama = FotoBarang::where('id_barang', $data->id)->first();
        // dd($foto_utama);
        return view('barang.detail', compact('data', 'foto_utama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit_kamera(Barang $barang, $id)
    {
        $data = Barang::find($id);
        $foto_barang = FotoBarang::where('id_barang',$id)->get();
        $kondisi = Kondisi::all();
        $merek = Merek::all();
        $kategori = Kategori::where('status', 1)->get();
        $mounting = Mounting::all();

        return view('barang.edit_kamera', compact('data', 'foto_barang','merek', 'kategori', 'mounting', 'kondisi'));
    }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit_lensa(Barang $barang, $id)
    {
        $data = Barang::find($id);
        $foto_barang = FotoBarang::where('id_barang',$id)->get();
        $kondisi = Kondisi::all();
        $merek = Merek::all();
        $kategori = Kategori::where('status', 0)->get();
        $mounting = Mounting::all();

        return view('barang.edit_lensa', compact('data', 'merek', 'kategori', 'mounting', 'kondisi', 'foto_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function perbarui_kamera(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            if ($request->has('hapus_gambar')) {
                foreach ($request->input('hapus_gambar') as $id_gambar) {
                    $gambar = FotoBarang::find($id_gambar);
                    Storage::delete('images/product', $gambar->lokasi_foto);
                    $gambar->delete();
                }
            }

            if ($request->has('gambar_produk')) {
                $this->tambah_gambar($request->file('gambar_produk'), $id);
            }

            $barang = Barang::find($id);
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'id_merek' => $request->merek,
                'tanggal_rilis' => $request->tanggal_rilis,
                'id_kondisi' => $request->kondisi,
                'id_kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
            ]);
            $kamera = Kamera::where('id',$barang->id_kamera);
            $kamera->update([
                'tipe_sensor' => $request->tipe_sensor,
                'jumlah_piksel' => $request->jumlah_piksel,
                'baterai' => $request->baterai,
                'id_mounting' => $request->mounting,
            ]);

            Toastr::success('Berhasil', 'Data Berhasil Diperbarui!', ['timeOut' => 5000]);
        });

        
        return redirect()->route('index');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function perbarui_lensa(LensaRequest $request, $id)
    {
        DB::transaction(function() use($request, $id){
            if ($request->has('hapus_gambar')) {
                foreach ($request->input('hapus_gambar') as $id_gambar) {
                    $gambar = FotoBarang::find($id_gambar);
                    Storage::delete('images/product', $gambar->lokasi_foto);
                    $gambar->delete();
                }
            }

            if ($request->has('gambar_produk')) {
                $this->tambah_gambar($request->file('gambar_produk'), $id);
            }

            $barang = Barang::find($id);
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'id_merek' => $request->merek,
                'tanggal_rilis' => $request->tanggal_rilis,
                'id_kondisi' => $request->kondisi,
                'id_kategori' => $request->kategori,
                'deskripsi' => $request->deskripsi,
            ]);
            $kamera = Lensa::where('id',$barang->id_lensa);
            $kamera->update([
                'focal_length' => $request->focal_length,
                'aperture' => $request->aperture,
                'berat' => $request->berat,
                'id_mounting' => $request->mounting,
            ]);

            Toastr::success('Berhasil', 'Data Berhasil Diperbarui!', ['timeOut' => 5000]);
        });

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function hapus_kamera($id)
    {
        try {
            DB::transaction(function () use ($id){
                $barang = Barang::find($id);
                $lelang = Lelang::where('id_barang', $barang->id)->first();
                if ($lelang) {
                    Toastr::error('Gagal', 'Data ini sudah terhubung ke Lelang!', ['timeOut' => 5000]);
                    return back();
                }else{
                    $kamera = $barang->id_kamera;
                    $barang->update([
                        'id_kamera' => null
                    ]);
                    Kamera::where('id', $kamera)->delete();
                    $foto_barang = FotoBarang::where('id_barang', $barang->id)->get();
                
                    $this->hapus_gambar($foto_barang);
                    $barang->delete();
                    
                    Toastr::success('Berhasil', 'Data Berhasil Dihapus!', ['timeOut' => 5000]);
                }
            });
        } catch (\Throwable $th) {
            Toastr::error('Gagal', 'Data Gagal Dihapus!', ['timeOut' => 5000]);
            return back();
        }
        return redirect()->back();
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function hapus_lensa($id)
    {
        try {
            DB::transaction(function () use ($id){
                $barang = Barang::find($id);
                $lelang = Lelang::where('id_barang', $barang->id)->first();
                if ($lelang) {
                    Toastr::error('Gagal', 'Data ini sudah terhubung ke Lelang!', ['timeOut' => 5000]);
                    return back();
                }else {
                    $lensa = $barang->id_lensa;
                    $barang->update([
                        'id_lensa' => null
                    ]);
                    Lensa::where('id', $lensa)->delete();
                    $foto_barang = FotoBarang::where('id_barang', $barang->id)->get();
                
                    $this->hapus_gambar($foto_barang);
                    $barang->delete();
            
                    Toastr::success('Berhasil', 'Data Berhasil Dihapus!', ['timeOut' => 5000]);
                }
            });
        } catch (\Throwable $th) {
            Toastr::error('Gagal', 'Data Gagal Dihapus!', ['timeOut' => 5000]);
            return back();
        }
        return redirect()->route('index');
    }

    public function tambah_gambar($gambar_barang, $barang_id)
    {
        DB::transaction(function () use ($gambar_barang, $barang_id) {
        $gambar = $gambar_barang;
        foreach($gambar as $file) {
            $gambar_produk = $file->storeAs('images/product', $file->getClientOriginalName());
                FotoBarang::create([
                    'id_barang' => $barang_id,
                    'lokasi_foto' => $gambar_produk, 
                ]);
            }    
        });
    }

    public function hapus_gambar($foto_barang)
    {
        foreach ($foto_barang as $id_gambar) {
            Storage::delete('images/product', $id_gambar->lokasi_foto);
        }
    }

    public function export_excel()
    {
        return Excel::download(new ExportBarang, 'leika-barang.xlsx');
    }

    public function export_pdf()
    {
        return Excel::download(new ExportBarang, 'leika-barang.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
