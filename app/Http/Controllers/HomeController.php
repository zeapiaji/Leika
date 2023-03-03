<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Penawaran;
use Illuminate\Http\Request;
use App\Exports\LelangExport;
use App\Models\Riwayat_Lelang;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PenggunaRequest;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $penawaran = Penawaran::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->get();
        $lelang = Lelang::where('status', 1)->count();
        $pengguna = User::role('masyarakat')->count();
        $barang = Barang::all()->count();   
        $petugas= User::role('petugas')->count();
        $riwayat_lelang = Riwayat_Lelang::orderBy('id', 'desc')->get();

        return view('home', compact('penawaran', 'lelang', 'pengguna', 'riwayat_lelang','petugas', 'barang'));
    }

    public function lihat_profil()
    {
        $user = User::find(Auth::user()->id);
        $roles = $user->getRoleNames();
        $penawaran = [];
        $inbox = [];
        if ($roles->contains('masyarakat')) {
            $penawaran = Penawaran::with('lelang')->where('id_user', $user->id)->orderBy('id', 'desc')->paginate(6);
            $inbox = Riwayat_Lelang::where('id_user', $user->id)->orderBy('id', 'desc')->paginate(6);
        }
        return view('pengguna.profil', compact('penawaran', 'inbox'));
    }

    public function perbarui_profil(PenggunaRequest $request, $id)
    {
        DB::transaction(function () use($request, $id){
            $user = User::find($id); 
            if ($request->has('foto_profil')) {
                Storage::delete('images/pengguna', $user->foto_profil);
                $foto_pengguna = $request->foto_profil->storeAs('images/pengguna', $request->foto_profil->getClientOriginalName());
            }else {
                $foto_pengguna = $user->foto_profil;
            }
                    
            $user->update([
                  'username' => $request->username,
                  'email' => $request->email,
                  'nama_lengkap' => $request->nama_lengkap,
                  'telp' => $request->telp,
                  'alamat' => $request->alamat,
                  'usia' => $request->usia,
                  'foto_profil' => $foto_pengguna,
              ]);
            Toastr::success('Berhasil', 'Data Berhasil Diperbarui!', ['timeOut' => 5000]);
        });

        return redirect()->back();
    }

    public function perbarui_sandi(Request $request, $id)
    {
        DB::transaction(function () use($request, $id){
            if ($request->password == $request->password_confirmation) {
                $user = User::find($id);
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                Toastr::success('Berhasil', 'Data Berhasil Diperbarui!', ['timeOut' => 5000]);
            }else{
                Toastr::error('Gagal', 'Data Gagal Diperbarui!', ['timeOut' => 5000]);
                return back()->withErrors(['password' => 'Password Tidak Sesuai.']);;
            }
        });

        return redirect()->back();
    }

    public function hapus_akun($id)
    {
        DB::transaction(function () use($id){
            
            User::find($id)->delete();
        });
        
        return redirect('/');
    }

    public function lihat_inbox($id)
    {
        $data = Riwayat_Lelang::find($id);
        return view('inbox.detail', compact('data'));
    }

    public function lihat_invoice($id)
    {
        $data = Riwayat_Lelang::find($id);
        return view('invoices.index', compact('data'));
    }
}
