@extends('layouts.guest')
@section('landing_page')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tagihan</h4>
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
                    <h5>Tagihan</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="invoice-title">
                    <h4 class="float-end font-size-16">Tagihan #{{$data->id}}</h4>
                    <div class="mb-4">
                        <img src="{{asset('images/logo-leika-dark.png')}}" alt="logo" style="height: 100px"/>
                    </div>
                    <div class="text-muted">
                        <p class="mb-1">Desa Sangkanhurip. Kabupaten Bandung</p>
                        <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> leika@gmail.com</p>
                        <p><i class="uil uil-phone me-1"></i> 0821-1505-9769</p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="text-muted">
                            <h5 class="font-size-16 mb-3">Tagihan Kepada:</h5>
                            <h5 class="font-size-15 mb-2">{{$data->user->nama_lengkap}}</h5>
                            <p class="mb-1">{{$data->user->alamat}}</p>
                            <p class="mb-1">{{$data->user->email}}</p>
                            <p>{{$data->user->telp}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted text-sm-end">
                            <div>
                                <h5 class="font-size-16 mb-1">Nomor Invoice:</h5>
                                <p>#{{$data->id}}</p>
                            </div>
                            <div class="mt-4">
                                <h5 class="font-size-16 mb-1">Tanggal Tagihan:</h5>
                                <p>{{$data->created_at->format('d M, Y')}}</p>
                            </div>
                            <div class="mt-4">
                                <h5 class="font-size-16 mb-1">Nomor Barang:</h5>
                                <p>#{{$data->barang->id}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="py-2">
                    <h5 class="font-size-15">Pembelian</h5>

                    <div class="table-responsive">
                        <table class="table table-nowrap table-centered mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th class="text-end" style="width: 120px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">01</th>
                                    <td>
                                        <h5 class="font-size-15 mb-1">{{$data->barang->nama_barang}}</h5>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">Merek : <span class="fw-medium">{{$data->barang->merek->nama}}</span></li>
                                            <li class="list-inline-item">Kategori : <span class="fw-medium">{{$data->barang->kategori->nama}}</span></li>
                                        </ul>
                                    </td>
                                    <td>Rp {{$data->penawaran_harga}}</td>
                                    <td>1</td>
                                    <td class="text-end">Rp {{$data->penawaran_harga}}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                    <td class="text-end">Rp {{$data->penawaran_harga}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end"><h4 class="m-0">{{$data->penawaran_harga}}</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-print-none mt-4">
                        <div class="float-end">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                            <a href="{{route('lihat_profil', Auth::user()->id)}}" class="btn btn-primary w-md waves-effect waves-light">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<script>
    function printAndNotify() {
  window.print();
  window.addEventListener('afterprint', function() {
    alert('File berhasil diunduh.');
  });
}
</script>
@endsection