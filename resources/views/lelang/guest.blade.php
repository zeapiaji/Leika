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

<div class="row">
    {{-- <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent border-bottom">
                <h5 class="mb-0">Filters</h5>
            </div>

            <div class="p-4">
                <h5 class="font-size-14 mb-3">Categories</h5>
                <div class="custom-accordion">
                    <a class="text-body fw-semibold pb-2 d-block" data-bs-toggle="collapse" href="#categories-collapse"
                        role="button" aria-expanded="false" aria-controls="categories-collapse">
                        <i class="mdi mdi-chevron-up accor-down-icon text-primary me-1"></i> Footwear
                    </a>
                    <div class="collapse show" id="categories-collapse">
                        <div class="card p-2 border shadow-none">
                            <ul class="list-unstyled categories-list mb-0">
                                <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Formal Shoes</a></li>
                                <li class="active"><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Sports
                                        Shoes</a></li>
                                <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> casual Shoes</a></li>
                                <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Sandals</a></li>
                                <li><a href="#"><i class="mdi mdi-circle-medium me-1"></i> Slippers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="p-4 border-top">
                <div>
                    <h5 class="font-size-14 mb-4">Price</h5>

                    <input type="text" id="pricerange">
                </div>
            </div>

            <div class="custom-accordion">
                <div class="p-4 border-top">
                    <div>
                        <h5 class="font-size-14 mb-0"><a href="#filtersizes-collapse" class="text-dark d-block"
                                data-bs-toggle="collapse">Sizes <i
                                    class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                        <div class="collapse show" id="filtersizes-collapse">
                            <div class="mt-4">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-15 mb-0">Select Sizes</h5>
                                    </div>
                                    <div class="w-xs">
                                        <select class="form-select">
                                            <option value="1">3</option>
                                            <option value="2">4</option>
                                            <option value="3">5</option>
                                            <option value="4">6</option>
                                            <option value="5" selected>7</option>
                                            <option value="6">8</option>
                                            <option value="7">9</option>
                                            <option value="8">10</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-4 border-top">
                    <div>
                        <h5 class="font-size-14 mb-0"><a href="#filterprodductcolor-collapse" class="text-dark d-block"
                                data-bs-toggle="collapse">Colors <i
                                    class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                        <div class="collapse show" id="filterprodductcolor-collapse">
                            <div class="mt-4">
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck1">
                                    <label class="form-check-label" for="productcolorCheck1"><i
                                            class="mdi mdi-circle text-dark mx-1"></i> Black</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck2">
                                    <label class="form-check-label" for="productcolorCheck2"><i
                                            class="mdi mdi-circle text-light mx-1"></i> White</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck3">
                                    <label class="form-check-label" for="productcolorCheck3"><i
                                            class="mdi mdi-circle text-secondary mx-1"></i> Gray</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck4">
                                    <label class="form-check-label" for="productcolorCheck4"><i
                                            class="mdi mdi-circle text-primary mx-1"></i> Blue</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck5">
                                    <label class="form-check-label" for="productcolorCheck5"><i
                                            class="mdi mdi-circle text-success mx-1"></i> Green</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck6">
                                    <label class="form-check-label" for="productcolorCheck6"><i
                                            class="mdi mdi-circle text-danger mx-1"></i> Red</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck7">
                                    <label class="form-check-label" for="productcolorCheck7"><i
                                            class="mdi mdi-circle text-warning mx-1"></i> Yellow</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" class="form-check-input" id="productcolorCheck8">
                                    <label class="form-check-label" for="productcolorCheck8"><i
                                            class="mdi mdi-circle text-purple mx-1"></i> Purple</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-4 border-top">
                    <div>
                        <h5 class="font-size-14 mb-0"><a href="#filterproduct-color-collapse" class="text-dark d-block"
                                data-bs-toggle="collapse">Customer Rating <i
                                    class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                        <div class="collapse show" id="filterproduct-color-collapse">
                            <div class="mt-4">
                                <div class="form-check mt-2">
                                    <input type="radio" id="productratingRadio1" name="productratingRadio1"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productratingRadio1">4 <i
                                            class="mdi mdi-star text-warning"></i> & Above</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productratingRadio2" name="productratingRadio1"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productratingRadio2">3 <i
                                            class="mdi mdi-star text-warning"></i> & Above</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productratingRadio3" name="productratingRadio1"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productratingRadio3">2 <i
                                            class="mdi mdi-star text-warning"></i> & Above</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productratingRadio4" name="productratingRadio1"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productratingRadio4">1 <i
                                            class="mdi mdi-star text-warning"></i></label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-4 border-top">
                    <div>
                        <h5 class="font-size-14 mb-0"><a href="#filterproduct-discount-collapse"
                                class="collapsed text-dark d-block" data-bs-toggle="collapse">Discount <i
                                    class="mdi mdi-chevron-up float-end accor-down-icon"></i></a></h5>

                        <div class="collapse" id="filterproduct-discount-collapse">
                            <div class="mt-4">
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio1" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio1">50% or more</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio2" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio2">40% or more</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio3" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio3">30% or more</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio4" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio4">20% or more</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio5" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio5">10% or more</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="radio" id="productdiscountRadio6" name="productdiscountRadio"
                                        class="form-check-input">
                                    <label class="form-check-label" for="productdiscountRadio6">Less than 10%</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div> --}}

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div>

                    <div class="row">
                        @foreach ($data as $item)
                        <div class="col-xl-4 col-sm-6">
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
                                                @if (isset($item->barang->lelang) && $item->barang->lelang->status == 1)
                                                <div class="d-flex flex-row-reverse">
                                                    <div class="badge bg-primary">
                                                        Sedang Dilelang
                                                    </div>
                                                </div>
                                                @else
                                                <div class="d-flex flex-row-reverse">
                                                    <div class="badge bg-danger">
                                                        Lelang Telah Berakhir
                                                    </div>
                                                </div>
                                                @endif

                                                @if ($item->barang->foto_barang->count() > 0)
                                                <img src="{{asset('storage/'.$item->barang->foto_barang->first()->lokasi_foto)}}"
                                                    alt="" style="height: 200px" class="img-fluid mx-auto d-block">
                                                @else
                                                <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                    style="height: 200px" class="img-fluid mx-auto d-block">
                                                @endif
                                            </div>

                                            <div class="text-center product-content p-4">

                                                <h5 class="mb-1"><a href="#"
                                                        class="text-dark">{{$item->barang->nama_barang}}</a></h5>
                                                <p class="text-muted text-bolder">@if ($item->barang->kategori->status == 1)
                                                    <i class="uil-camera"></i>
                                                    @else
                                                    <i class="uil-shutter"></i>
                                                    @endif
                                                    {{$item->barang->kategori->nama}}
                                                </p>
                                                @if (isset($item->barang->lelang))
                                                <h5 class="mt-3 mb-0">
                                                    <span class="text-muted me-2 fs-6">
                                                        <i class="uil-users-alt"></i>{{$item->barang->lelang->penawaran ? $item->barang->lelang->penawaran->groupBy('id_user')->count() : '0'}}
                                                    </span>
                                                    <span class="fw-bolder">
                                                        <i class="uil-money-withdraw"></i> {{$item->barang->lelang->harga_tertinggi}}
                                                    </span>
                                                </h5>
                                                @else
                                                <h6 class="text-muted">
                                                    Barang sedang tidak dilelang
                                                </h6>
                                                @endif
                                                <ul class="list-inline mb-0 text-muted product-color">
                                                    <a href="{{route('lihat_lelang', $item->barang->id)}}"
                                                        class="btn btn-sm btn-primary"><i class="uil-enter"></i> Lihat Lelang</a>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- end row -->

                                <div class="row mt-4">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
            <!-- end row -->

@endsection
