@extends('layouts.guest')
@section('landing_page')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Inbox</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        @role('masyarakat')
                        <a href="/">
                            Halaman Utama
                        <a href=""></a>
                        @endrole
                    </h5>
                    <h5 class="ms-1 me-1">/</h5> 
                    <h5>Inbox</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="d-flex align-items-start mb-4">
                    <div class="flex-shrink-0 me-3">
                        @if(Storage::exists($data->lelang->user->foto_barang))
                        <img class="rounded-circle avatar-sm" src="{{asset('storage/'. $data->lelang->user->foto_profil)}}" alt="Generic placeholder image">
                        @else
                        <img class="rounded-circle avatar-sm" src="{{asset('images/users/default.png')}}" alt="Generic placeholder image">
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-14 my-1">{{$data->lelang->user->nama_lengkap}}</h5>
                        <small class="text-muted">Petugas Lelang</small>
                    </div>
                    <div class="ms-auto">
                        <h5 class="font-size-14 my-1">{{Auth::user()->riwayat_lelang->created_at}}</h5>
                    </div>
                </div>
        
                <h4 class="font-size-16">Pemenang Lelang {{Auth::user()->riwayat_lelang->barang->nama_barang}}</h4>
        
                <p>Selamat {{Auth::user()->nama_lengkap}},</p>
                <p>Kami ucapkan selamat, anda telah berhasil memenangkan lelang {{Auth::user()->riwayat_lelang->barang->nama_barang}} yang dibuka pada jam {{Auth::user()->riwayat_lelang->lelang->created_at->format('H:i d-m-Y')}} dengan penawaran sebesar Rp {{Auth::user()->riwayat_lelang->penawaran_harga}}.
                </p>
                <p>
                    Invoice <a href="{{route('lihat_invoice', $data->id)}}">disini</a>
                </p>
                <p>Terimakasih,</p>
                <hr/>
        
                <div class="row">
                    @foreach ($data->barang->foto_barang as $item)    
                    <div class="col-xl-2 col-6">
                        <div class="card border shadow-none">
                            <img class="card-img-top img-fluid" src="{{asset('storage/'.$item->lokasi_foto)}}" alt="Card image cap">
                        </div>
                    </div>
                    @endforeach
                </div>
        
                <a href="{{route('lihat_profil', Auth::user()->id)}}" class="btn btn-secondary waves-effect mt-4">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection