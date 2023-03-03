@extends('layouts.guest')
@section('landing_page')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Lelang {{$data->barang->nama_barang}}</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    @role('masyarakat')
                    <h5 class="text-dark">
                        <a href="{{route('home')}}">
                            Halaman Utama
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5>
                    <h5>Lihat Lelang</h5>
                    @endrole
                    @role('petugas')
                    <h5 class="text-dark">
                        <a href="{{route('lelang')}}">
                            Lelang
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5>
                    <h5>Lihat Lelang {{$data->barang->nama_barang}}</h5>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-12">
        <div class="card p-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="product-detail">
                            <div class="row">
                                <div class="col-3">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        @if (count($data->barang->foto_barang)>0)    
                                        @foreach ($data->barang->foto_barang as $item)
                                        <a class="nav-link {{$item->id == $foto_utama->id ? 'active' : ''}}"
                                            id="product-{{$item->id}}-tab" data-bs-toggle="pill"
                                            href="#product-{{$item->id}}" role="tab">
                                            <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                                class="img-fluid mx-auto d-block tab-img rounded"
                                                style="max-height: 40px">
                                        </a>
                                        @endforeach
                                        @else
                                        <a class="nav-link active">
                                            <img src="{{asset('images/product/img-1.png')}}" alt=""
                                            class="img-fluid mx-auto d-block tab-img rounded"
                                            style="max-height: 40px">
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="tab-content position-relative" id="v-pills-tabContent">
                                        @if (count($data->barang->foto_barang)>0)
                                        @foreach ($data->barang->foto_barang as $item)
                                        <div class="tab-pane fade show {{$item->id == $foto_utama->id ? 'active' : ''}}"
                                            id="product-{{$item->id}}" role="tabpanel">
                                            <div class="zoom-galery">
                                                <a href="{{asset('storage/'.$item->lokasi_foto)}}"
                                                    title="Foto {{$data->barang->nama_barang}}">
                                                    <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                                        class="img-fluid mx-auto d-block" style="height: 250px"
                                                        data-zoom="{{asset('storage/'.$item->lokasi_foto)}}">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="tab-pane fade show active">
                                            <div class="product-img">
                                                <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                    class="img-fluid mx-auto d-block" style="height: 250px"
                                                    data-zoom="{{asset('images/product/img-1.png')}}">
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="d-flex flex-row">
                            <div class="col-xl-7">
                                <div class="mt-4 mt-xl-3 ps-xl-4">
                                    <h5 class="font-size-14"><a href="#" class="text-muted">{{$data->barang->merek->nama}}</a>
                                    </h5>
                                    <h4 class="font-size-20 mb-3">{{$data->barang->nama_barang}}</h4>
        
                                    <div class="d-flex">
                                        <div class="text-muted fs-6"> Kondisi </div>
                                        @if ($data->barang->id_kondisi == 1)
                                        <span class="badge bg-primary font-size-14 me-1 ms-2">
                                            @elseif($data->barang->id_kondisi == 2)
                                            <span class="badge bg-success font-size-14 me-1 ms-2">
                                                @elseif($data->barang->id_kondisi == 3)
                                                <span class="badge bg-warning font-size-14 me-1 ms-2">
                                                    @else
                                                    <span class="badge bg-danger font-size-14 me-1 ms-2">
                                                        @endif
                                                        {{$data->barang->kondisi->nama}}</span>
                                    </div>
        
                                    <div class="mt-4 pt-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="text-muted me-2"><i class="uil-tag-alt"></i> Harga Awal</div>
                                                <div class="text-muted me-2"><i class="uil-arrow-growth"></i> Harga Kelipatan
                                                </div>
                                                <div class="text-muted me-2 mt-2"><i class="uil-user"></i> Penawaran Tertinggi
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6>
                                                    {{$data->harga_awal}}
                                                </h6>
                                                <h6>
                                                    {{$data->kelipatan_harga}}
                                                </h6>
                                                <h4>
                                                    {{$data->harga_tertinggi}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="mt-2">
                                        @if ($data->status == 0)
                                        <button type="button"
                                            class="btn btn-lg btn-primary waves-effect ms-auto mt-2 waves-light" disabled>
                                            <i class="uil uil-shopping-basket me-2"></i>Lelang Ditutup
                                        </button>
                                        @elseif ($data->status == 1)
                                        <button type="button"
                                            class="btn btn-lg btn-primary waves-effect ms-auto mt-2 waves-light"
                                            onclick="bid({{$data->id}})" @role('petugas||admin') disabled @endrole>
                                            <i class="uil uil-shopping-basket me-2"></i>Bid Sekarang
                                        </button>
                                        @elseif($data->status == 2)
                                        <button type="button"
                                            class="btn btn-lg btn-primary waves-effect ms-auto mt-2 waves-light" disabled>
                                            <i class="uil uil-shopping-basket me-2"></i>Lelang Telah Berakhir
                                        </button>
                                        <p>Dimenangkan oleh <b>{{$data->riwayat_lelang->user->username}}</b></p>
                                        @else
                                        <button class="btn btn-lg btn-primary waves-effect ms-auto mt-2 waves-light" disabled>
                                            <i class="uil uil-shopping-basket me-2"></i>Bid Sekarang
                                        </button>
                                        @endif
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
                                                                {{\Carbon\Carbon::parse($data->barang->tanggal_rilis)->format('d/m/Y')}}
                                                            </div>
                                                        </li>
                                                        <li class="d-flex">
                                                            <div class="text-muted me-auto">
                                                                Kategori
                                                            </div>
                                                            <div class="fw-bold">
                                                                {{$data->barang->kategori->nama}}
                                                            </div>
                                                        </li>
                                                        <li class="d-flex">
                                                            <div class="text-muted me-auto">
                                                                Merek
                                                            </div>
                                                            <div class="fw-bold">
                                                                {{$data->barang->merek->nama}}
                                                            </div>
                                                        </li>
                                                    </ul>
        
                                                </div>
                                            </div>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent">
                                        <h5>5 Penawaran Tertinggi</h5>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($penawaran as $item)
                                        <div class="d-flex">
                                            <h5>
                                                {{$item->user->username}}
                                            </h5>
                                            <h6 class="ms-auto">
                                                Rp {{$item->harga_penawaran}}
                                            </h6>
                                        </div>
                                        @endforeach
                                    </div>
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
                                        <div class="text-muted p-2">
                                            <p>{{$data->barang->deskripsi}}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                @if ($data->barang->kamera)
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 20%;">Tipe Sensor</th>
                                                        <td>{{$data->barang->kamera->tipe_sensor}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jumlah Piksel</th>
                                                        <td>{{$data->barang->kamera->jumlah_piksel}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Baterai</th>
                                                        <td>{{$data->barang->kamera->baterai}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mounting Kamera</th>
                                                        <td>{{$data->barang->kamera->mounting->nama}}</td>
                                                    </tr>

                                                </tbody>
                                                @else
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" style="width: 20%;">Focal Length</th>
                                                        <td>{{$data->barang->lensa->focal_length}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Aperture</th>
                                                        <td>{{$data->barang->lensa->aperture}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Berat</th>
                                                        <td>{{$data->barang->lensa->berat}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mounting Lensa</th>
                                                        <td>{{$data->barang->lensa->mounting->nama}}</td>
                                                    </tr>

                                                </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="disqus_thread"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-transparent">
                <h3 class="fw-bolder">
                    Lelang Lainnya
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (count($lelang_lainya)>0)    
                    @foreach ($lelang_lainya as $item)
                    <div class="col-xl-3 col-sm-4">
                        <a href="{{route('lihat_lelang', $item->barang->id)}}">
                        <div class="product-grid">
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
                                {{-- @dd($item->barang->foto_barang->first()) --}}
                                @if (Storage::exists($item->barang->foto_barang))
                                @foreach ($item->barang->foto_barang->take(1) as $foto)
                                <img src="{{asset('storage/'.$foto->lokasi_foto)}}" alt=""
                                    class="img-fluid mx-auto d-block" style="max-height: 200px;">
                                @endforeach
                                @else
                                <img src="{{asset('images/product/img-1.png')}}" alt=""
                                    class="img-fluid mx-auto d-block tab-img rounded"
                                    style="max-width: 200px">
                                @endif
                            </div>

                            <div class="text-center product-content p-4">
                                <a href="{{route('lihat_lelang', $item->barang->id)}}">
                                <h5 class="mb-1"
                                        class="text-dark">{{$item->barang->nama_barang}}</h5>
                                <p class="text-muted font-size-13">@if ($item->barang->kategori->status == 1)
                                    <i class="uil-camera"></i>
                                    @else
                                    <i class="uil-shutter"></i>
                                    @endif
                                    {{$item->barang->kategori->nama}}</p>

                                    <h5 class="mt-3 mb-0">
                                        <span class="text-muted me-2 fs-6">
                                            <i class="uil-users-alt"></i>{{$item->penawaran ? $item->penawaran->count() : '0'}}
                                        </span>
                                        <span class="fw-bolder">
                                            <i class="uil-money-withdraw"></i>
                                            {{$item->harga_tertinggi}}
                                        </span>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="text-center">
                        <h5>Tidak ada lelang lain tersedia.</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



            <script>
                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                var disqus_config = function () {
                    this.page.url =
                        '{{route("lihat_lelang", $data->id_barang)}}'; // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier =
                        '{{$data->id_barang}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };
                (function () { // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://leika-1.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();

            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                    by
                    Disqus.</a></noscript>

            <script>
                function bid(id) {
                    Swal.fire({
                        title: 'Anda yakin ingin melakukan penawaran?',
                        icon: 'question',
                        showCancelButton: true,
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#5B73E8',
                        confirmButtonText: 'Ya, Bid Sekarang!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('bid', ['id' => ':id']) }}".replace(':id', id);
                        }
                    })
                }

            </script>

            @endsection
