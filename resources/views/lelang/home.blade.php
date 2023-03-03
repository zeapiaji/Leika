@extends('layouts.guest')

@section('landing_page')

<div class="card">
    <div class="card-body">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{asset('images/carousel/banner-1.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('images/carousel/banner-2.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="{{asset('images/carousel/banner-3.png')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
                    
        <div class="row">
            <div class="col-3 p-3">
                <h1 class="fw-bolder">Dilelang</h1>
                <p class="">Daftar Barang yang Dilelang</p>
            </div>
            <div class="col-9">
                <div class="row">
                    @if (count($data)>0)    
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
                    @else
                </div>
                <div class="text-center mt-5">
                    <h5 class="text-muted">Belum ada Lelang yang dimulai</h5>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-3 p-3">
                <h1 class="fw-bolder">Selesai Dilelang</h1>
                <p class="">Daftar Barang yang selesai Dilelang</p>
            </div>
            <div class="col-9">
                
                <div class="row">
                    @if (count($selesai_lelang)>0)    
                    @foreach ($selesai_lelang as $item)
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
                    @else
                    <div class="text-center mt-5">
                        <h5 class="text-muted">Belum ada Lelang yang berakhir</h5>
                    </div>
                    @endif
                </div>
            </div>               
        </div>
    </div>
</div>

@endsection
