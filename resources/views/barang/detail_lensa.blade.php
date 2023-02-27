@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Product Detail</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="product-1-tab" data-bs-toggle="pill"
                                            href="#product-1" role="tab">
                                            <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                        <a class="nav-link" id="product-2-tab" data-bs-toggle="pill" href="#product-2"
                                            role="tab">
                                            <img src="{{asset('images/product/img-2.png')}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                        <a class="nav-link" id="product-3-tab" data-bs-toggle="pill" href="#product-3"
                                            role="tab">
                                            <img src="{{asset('images/product/img-3.png')}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                        <a class="nav-link" id="product-4-tab" data-bs-toggle="pill" href="#product-4"
                                            role="tab">
                                            <img src="{{asset('images/product/img-6.png')}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="tab-content position-relative" id="v-pills-tabContent">

                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block"
                                                    data-zoom="{{asset('images/product/img-1.png')}}">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-2" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-2.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-3" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-3.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-4" role="tabpanel">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-6.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block">
                                            </div>
                                        </div>
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
                                <div class="row">
                                    <div class="col-md-6">
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

                                <div class="mt-4">
                                    <h5 class="font-size-14 mb-3">Deskripsi Produk : </h5>
                                    <div class="product-desc">
                                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link" id="desc-tab" data-bs-toggle="tab" href="#desc"
                                                    role="tab">Deskripsi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="specifi-tab" data-bs-toggle="tab"
                                                    href="#specifi" role="tab">Spesifikasi</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content border border-top-0 p-4">
                                            <div class="tab-pane fade" id="desc" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2">
                                                        <div>
                                                            <img src="{{asset('images/product/img-6.png')}}" alt=""
                                                                class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9 col-md-10">
                                                        <div class="text-muted p-2">
                                                            <p>{{$data->deskripsi}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" style="width: 20%;">Focal Length</th>
                                                                <td>{{$data->lensa->focal_length}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Aperture</th>
                                                                <td>{{$data->lensa->aperture}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Berat</th>
                                                                <td>{{$data->lensa->berat}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mounting Lensa</th>
                                                                <td>{{$data->lensa->mounting->nama}}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card bg-primary border-primary text-white-50">
                            <div class="card-body">
                                <h5 class="mb-4 text-white"><i class="uil uil-question-circle me-3"></i>Setting</h5>
                                <p class="card-text">Produk <b>{{$data->nama_barang}}</b> ditambahkan pada {{\Carbon\Carbon::parse($data->crated_at)->format('d M y')}}.</p>

                                <div class="d-flex mt-2 gap-2 flex-row-reverse">
                                    <a href="{{route('hapus.lensa', $data->id)}}" class="btn btn-sm btn-danger">Hapus</a>
                                    <a href="{{route('edit.lensa', $data->id)}}" class="btn btn-sm btn-success">Edit</a>
                                </div>
                            </div><!-- end card-body -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include('components.btn-back')
@endsection
