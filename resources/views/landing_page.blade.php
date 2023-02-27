@extends('layouts.guest')

@section('landing_page')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Barang Dilelang</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
                    
        <div class="row">
            @foreach ($data as $item)
            <div class="col-xl-3 col-sm-6">
                <div class="product-box">
                    <div class="product-img pt-4 px-4">
                        @if ($item->barang->id_kondisi == 1)
                        <div class="product-ribbon badge bg-primary">
                        @elseif ($item->barang->id_kondisi == 2)
                        <div class="product-ribbon badge bg-success">
                        @elseif ($item->barang->id_kondisi == 3)
                        <div class="product-ribbon badge bg-warning">
                        @else
                        <div class="product-ribbon badge bg-danger">
                        @endif
                            {{$item->barang->kondisi->nama}}
                        </div>

                        @if ($item->barang->foto_barang->count() > 0)
                        <img src="{{asset('storage/'.$item->barang->foto_barang->first()->lokasi_foto)}}"
                            alt="" style="height: 200px" class="img-fluid mx-auto d-block">
                        @else
                        <img src="{{asset('images/product/img-1.png')}}" alt="" style="height: 200px"
                            class="img-fluid mx-auto d-block">
                        @endif
                    </div>

                    <div class="text-center product-content p-4">

                        <h5 class="mb-1"><a href="#" class="text-dark">{{$item->barang->nama_barang}}</a></h5>
                        <p class="text-muted text-bolder">@if ($item->barang->kategori->status
                            == 1)
                            <i class="uil-camera"></i>
                            @else
                            <i class="uil-shutter"></i>
                            @endif
                            {{$item->barang->kategori->nama}}
                        </p>
                        <h5 class="mt-3 mb-0">
                            <span class="text-muted me-2 fs-6">
                                <i class="uil-users-alt"></i> {{$item->penawaran ? $item->penawaran->count() : '0'}}
                            </span>
                            <span class="fw-bolder">
                                <i class="uil-money-withdraw"></i> {{$item->harga_tertinggi}}
                            </span>
                        </h5>
                        <ul class="list-inline mb-0 text-muted product-color">
                            <a href="{{route('lihat_lelang', $item->barang->id)}}"
                                class="btn btn-sm btn-primary"><i class="uil-enter"></i> Ikut
                                Lelang</a>
                        </ul>


                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
