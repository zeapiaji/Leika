@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Buka Lelang</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5><a href="{{route('lelang')}}">Kelola Lelang</a></h5>
                    <h5 class="ms-1 me-1">/</h5>
                    <h5>Buka Lelang</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="fw-bolder">
                    Data Barang
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        @foreach ($data->foto_barang as $item)
                                        <a class="nav-link {{$item->id == $foto_utama->id ? 'active' : ''}}"
                                            id="product-{{$item->id}}-tab" data-bs-toggle="pill"
                                            href="#product-{{$item->id}}" role="tab">
                                            <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded"
                                                style="max-height: 40px">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="tab-content position-relative" id="v-pills-tabContent">
                                        @if (count($data->foto_barang)>0)
                                        @foreach ($data->foto_barang as $item)
                                        <div class="tab-pane fade show {{$item->id == $foto_utama->id ? 'active' : ''}}"
                                            id="product-{{$item->id}}" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                                    class="img-fluid mx-auto d-block"
                                                    data-zoom="{{asset('storage/'.$item->lokasi_foto)}}">
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="tab-pane fade show active"
                                            id="product" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="mt-4 mt-xl-3 ps-xl-4">
                            <h5 class="font-size-14"><a href="#" class="text-muted">{{$data->merek->nama}}</a></h5>
                            <h4 class="font-size-20 mb-3">{{$data->nama_barang}}</h4>

                            <div class="d-flex">
                                <div class="text-muted fs-6"> Kondisi </div>
                                @if ($data->id_kondisi == 1)
                                <span class="badge bg-primary font-size-14 me-1 ms-2">
                                    @elseif($data->id_kondisi == 2)
                                    <span class="badge bg-success font-size-14 me-1 ms-2">
                                        @elseif($data->id_kondisi == 3)
                                        <span class="badge bg-warning font-size-14 me-1 ms-2">
                                            @else
                                            <span class="badge bg-danger font-size-14 me-1 ms-2">
                                                @endif
                                                {{$data->kondisi->nama}}</span>

                            </div>

                            <div class="mt-3">

                                <h5 class="font-size-14">Informasi Umum :</h5>
                                <ul class="list-unstyled product-desc-list text-muted">
                                    <li class="d-flex">
                                        <div class="text-muted me-auto">Tanggal Rilis</div>
                                        <div class="fw-bold">
                                            {{\Carbon\Carbon::parse($data->tanggal_rilis)->format('d/m/Y')}}
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="text-muted me-auto">
                                            Kategori
                                        </div>
                                        <div class="fw-bold">
                                            {{$data->kategori->nama}}
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="text-muted me-auto">
                                            Merek
                                        </div>
                                        <div class="fw-bold">
                                            {{$data->merek->nama}}
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <form action="{{route('buka_lelang', $data->id)}}" method="post" class="custom-validation">
                @csrf
                <div class="card-header">
                    <h5 class="fw-bolder">
                        Buka Lelang {{$data->nama_barang}}
                    </h5>
                </div>
                <div class="card-body">
                    <label for="harga_awal">Harga Awal</label>
                    <input type="number" name="harga_awal" class="form-control" id="harga_awal" @if(isset($data->lelang)) value="{{$data->lelang->harga_awal}}" disabled @endif
                        placeholder="Masukan Harga Awal Penawaran" required data-parsley-error-message="Masukan Harga Awal!">
                    <div class="mt-3">
                        <label for="kelipatan_harga">Kelipatan</label>
                        <input type="number" name="kelipatan_harga" class="form-control" id="kelipatan_harga" @if(isset($data->lelang)) value="{{$data->lelang->kelipatan_harga}}" disabled @endif
                            placeholder="Masukan Kelipatan Harga Penawaran" required data-parsley-error-message="Masukan Kelipatan Harga!">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="uil-unlock-alt"></i>
                     Buka Lelang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('components.btn-back-lelang')
@endsection
