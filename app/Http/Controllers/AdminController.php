<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PenggunaRequest;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::role('petugas')->get();
        $no = 1;

        return view('kelola_petugas.index', compact('data', 'no'));
    }

    public function edit($id)
    {
        $data = User::role('petugas')->where('id', $id)->first();

        return view('kelola_petugas.edit', compact('data'));
    }

    public function perbarui(Request $request, $id)
    {
        // dd($request->all());
        $cusMessage= [
            'foto_profil.required' => 'Foto Profil harus diisi!',
            'username' => 'Username harus diisi!',
            'nama_lengkap' => 'Nama Lengkap harus diisi!',
            'telp' => 'Nomor Telepon harus diisi!',
            'usia' => 'Usia harus diisi!',
            'alamat' => 'Alamat harus diisi!',
        ];

        $request->validate([
            'nama_lengkap' => 'required',
            'telp' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ], $cusMessage);

        DB::transaction(function () use($request, $id){
            // $foto_pengguna = $request->storeAs('images/pengguna', $request->getClientOriginalName());
            User::find($id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'usia' => $request->usia,
            ]);
        });

        return redirect()->route('petugas');
    }

    public function hapus($id)
    {
        DB::transaction(function () use($id){
            
            $data = User::find($id)->delete();
            Toastr::success('Berhasil', 'Data Berhasil Dihapus!', ['timeOut' => 5000]);
        });

        return back();
    }

    public function petugas_unggah(PenggunaRequest $request)
    {

        $cusMessage= [
            'foto_profil.required' => 'Foto Profil harus diisi!',
            'username' => 'Username harus diisi!',
            'email' => 'Email harus diisi!',
            'nama_lengkap' => 'Nama Lengkap harus diisi!',
            'telp' => 'Nomor Telepon harus diisi!',
            'usia' => 'Usia harus diisi!',
            'alamat' => 'Alamat harus diisi!',
        ];

        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'nama_lengkap' => 'required',
            'telp' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
        ], $cusMessage);

        // dd($request->all());

        DB::transaction(function () use($request){
            $foto_profil = $request->foto_profil->storeAs('images/pengguna', $request->foto_profil->getClientOriginalName());
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nama_lengkap' => $request->nama_lengkap,
                'telp' => $request->telp,
                'usia' => $request->usia,
                'alamat' => $request->alamat,
                'foto_profil' => $foto_profil,
            ])->assignRole('petugas');
        });

        return redirect()->route('petugas');
    }
}
