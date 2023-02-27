@extends('layouts.app')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Dasbor</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="total-revenue-chart" data-colors='["--bs-primary"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$riwayat_lelang->count()}}</span></h4>
                    <p class="text-muted mb-0">Lelang Selesai</p>
                </div>

            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="orders-chart" data-colors='["--bs-success"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$lelang}}</span></h4>
                    <p class="text-muted mb-0">Lelang Sedang Dimulai</p>
                </div>
              
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="customers-chart" data-colors='["--bs-primary"]'> </div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{$pengguna}}</span></h4>
                    <p class="text-muted mb-0">Pengguna</p>
                </div>
               
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">

        <div class="card">
            <div class="card-body">
                <div class="float-end mt-2">
                    <div id="growth-chart" data-colors='["--bs-warning"]'></div>
                </div>
                <div>
                    <h4 class="mb-1 mt-1"> <span data-plugin="counterup">{{ $petugas }}</span></h4>
                    <p class="text-muted mb-0">Petugas</p>
                </div>
               
            </div>
        </div>
    </div> <!-- end col-->
</div> <!-- end row-->

{{-- <div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                    class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Yearly</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                        </div>
                    </div>
                </div>
                <h4 class="card-title mb-4">Sales Analytics</h4>

                <div class="mt-1">
                    <ul class="list-inline main-chart mb-0">
                        <li class="list-inline-item chart-border-left me-0 border-0">
                            <h3 class="text-primary">$<span data-plugin="counterup">2,371</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Income</span></h3>
                        </li>
                        <li class="list-inline-item chart-border-left me-0">
                            <h3><span data-plugin="counterup">258</span><span
                                    class="text-muted d-inline-block font-size-15 ms-3">Sales</span>
                            </h3>
                        </li>
                        <li class="list-inline-item chart-border-left me-0">
                            <h3><span data-plugin="counterup">3.6</span>%<span
                                    class="text-muted d-inline-block font-size-15 ms-3">Conversation Ratio</span></h3>
                        </li>
                    </ul>
                </div>

                <div class="mt-3">
                    <div id="sales-analytics-chart" data-colors='["--bs-primary", "#dfe2e6", "--bs-warning"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-4">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <p class="text-white font-size-18">Enhance your <b>Campaign</b> for better outreach <i
                                class="mdi mdi-arrow-right"></i></p>
                        <div class="mt-4">
                            <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light">Upgrade
                                Account!</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mt-4 mt-sm-0">
                            <img src="assets/images/setup-analytics-amico.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->

        <div class="card">
            <div class="card-body">
                <div class="float-end">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-semibold">Sort By:</span> <span class="text-muted">Yearly<i
                                    class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Yearly</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mb-4">Top Selling Products</h4>


                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-3">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-primary me-2"></i>
                            Desktops </p>
                    </div>

                    <div class="col-sm-9">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-primary" role="progressbar" style="width: 52%"
                                aria-valuenow="52" aria-valuemin="0" aria-valuemax="52">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-3">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-info me-2"></i> iPhones
                        </p>
                    </div>
                    <div class="col-sm-9">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-info" role="progressbar" style="width: 45%"
                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="45">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-3">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-success me-2"></i>
                            Android </p>
                    </div>
                    <div class="col-sm-9">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-success" role="progressbar" style="width: 48%"
                                aria-valuenow="48" aria-valuemin="0" aria-valuemax="48">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-3">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-warning me-2"></i>
                            Tablets </p>
                    </div>
                    <div class="col-sm-9">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-warning" role="progressbar" style="width: 78%"
                                aria-valuenow="78" aria-valuemin="0" aria-valuemax="78">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

                <div class="row align-items-center g-0 mt-3">
                    <div class="col-sm-3">
                        <p class="text-truncate mt-1 mb-0"><i class="mdi mdi-circle-medium text-purple me-2"></i> Cables
                        </p>
                    </div>
                    <div class="col-sm-9">
                        <div class="progress mt-1" style="height: 6px;">
                            <div class="progress-bar progress-bar bg-purple" role="progressbar" style="width: 63%"
                                aria-valuenow="63" aria-valuemin="0" aria-valuemax="63">
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end Col -->
</div> <!-- end row--> --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Transaksi Terakhir</h4>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nomor Lelang</th>
                                <th>Pengguna</th>
                                <th>Barang</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat_lelang as $item)    
                            <tr>
                                <td><a href="{{route('lihat_lelang', $item->id_barang)}}" class="text-body fw-bold">#{{$item->id}}</a> </td>
                                <td>{{$item->user->nama_lengkap}}</td>
                                <td>{{$item->barang->nama_barang}}</td>
                                <td>{{$item->lelang->user->nama_lengkap}}</td>
                                <td>
                                    {{$item->created_at->format('d M, Y')}}
                                </td>
                                <td>
                                    {{$item->penawaran_harga}}
                                </td>
                                <td>
                                    <a href="{{route('lihat_invoice', $item->id)}}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Pemenang Lelang</h4>

                <div data-simplebar style="max-height: 339px;">
                    <div class="table-responsive">
                        <table class="table table-borderless table-centered table-nowrap">
                            <tbody>
                                @foreach ($riwayat_lelang as $item)    
                                <tr>
                                    <td style="width: 20px;"><img src="{{asset('storage/'. $item->user->foto_profil)}}"
                                            class="avatar-xs rounded-circle " alt="..."></td>
                                    <td>
                                        <h6 class="font-size-15 mb-1 fw-normal">{{$item->user->nama_lengkap}}</h6>
                                        <p class="text-muted font-size-13 mb-0">
                                            {{$item->barang->nama_barang}}</p>
                                    </td>
                                        <td class="text-muted fw-semibold text-end"><i
                                            class="icon-xs icon me-2 text-success"
                                            data-feather="trending-up"></i>Rp {{$item->penawaran_harga}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- enbd table-responsive-->
                </div> <!-- data-sidebar-->
            </div><!-- end card-body-->
        </div> <!-- end card-->
    </div><!-- end col -->

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Aktifitas Baru-Baru Ini</h4>

                <ol class="activity-feed mb-0 ps-2" data-simplebar style="max-height: 339px;">
                    @foreach ($penawaran as $item)    
                    <li class="feed-item">
                        <div class="feed-item-list">
                            <p class="text-muted mb-1 font-size-13">Hari ini<small class="d-inline-block ms-1">{{$item->created_at->format('H:i')}}</small></p>
                            <p class="mb-0">{{$item->user->nama_lengkap}}, melakukan penawaran: <span class="text-primary">
                                {{$item->lelang->barang->nama_barang}}
                                    Rp {{$item->harga_penawaran}}
                                </span></p>
                        </div>
                    </li>
                    @endforeach

                </ol>

            </div>
        </div>
    </div>

    {{-- <div class="col-xl-4">
        <div class="card">
            <div class="card-body">

                <div class="float-end">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="dropdownMenuButton4" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton4">
                            <a class="dropdown-item" href="#">Yearly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                        </div>
                    </div>
                </div>

                <h4 class="card-title">Social Source</h4>

                <div class="text-center">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-soft-primary font-size-24">
                            <i class="mdi mdi-facebook text-primary"></i>
                        </span>
                    </div>
                    <p class="font-16 text-muted mb-2"></p>
                    <h5><a href="#" class="text-dark">Facebook - <span class="text-muted font-16">125 sales</span> </a>
                    </h5>
                    <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero
                        venenatis faucibus tincidunt.</p>
                    <a href="#" class="text-reset font-16">Learn more <i class="mdi mdi-chevron-right"></i></a>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-primary font-size-16">
                                    <i class="mdi mdi-facebook text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15">Facebook</h5>
                            <p class="text-muted mb-0">125 sales</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-info font-size-16">
                                    <i class="mdi mdi-twitter text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15">Twitter</h5>
                            <p class="text-muted mb-0">112 sales</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-pink font-size-16">
                                    <i class="mdi mdi-instagram text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15">Instagram</h5>
                            <p class="text-muted mb-0">104 sales</p>
                        </div>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <a href="#" class="text-primary font-size-14 fw-medium">View All Sources <i
                            class="mdi mdi-chevron-right"></i></a>
                </div>

            </div>
        </div>
    </div> --}}
</div>
<!-- end row -->


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div> --}}
@endsection
