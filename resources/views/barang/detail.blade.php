@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Detail Produk</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        <a href="{{route('dasbor')}}">
                            Dasbor
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5> 
                    <h5>{{$data->nama_barang}}</h5>
                </div>
            </div>
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

                                        @foreach ($data->foto_barang as $item)
                                        <div class="tab-pane fade show {{$item->id == $foto_utama->id ? 'active' : ''}}"
                                            id="product-{{$item->id}}" role="tabpanel">
                                            <div class="zoom-gallery">
                                                <div class="mt-4">
                                                    <a href="{{asset('storage/'.$item->lokasi_foto)}}"
                                                        title="Foto {{$data->nama_barang}}">
                                                        <div class="img-fluid">
                                                            @if (Storage::exists($item->lokasi_foto))
                                                            <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                                                class="img-fluid d-block" data-source="{{asset('storage/'.$item->lokasi_foto)}}">
                                                            @else
                                                            <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                                class="img-fluid d-block" data-source="{{asset('storage/'.$item->lokasi_foto)}}">
                                                            @endif
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
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
                                    <div class="col-md-12">
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
                                            @if ($data->id_kamera > 0)
                                            <div class="tab-pane fade show active" id="specifi" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" style="width: 20%;">Tipe Sensor</th>
                                                                <td>{{$data->kamera->tipe_sensor}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Jumlah Piksel</th>
                                                                <td>{{$data->kamera->jumlah_piksel}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Baterai</th>
                                                                <td>{{$data->kamera->baterai}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Mounting Lensa</th>
                                                                <td>{{$data->kamera->mounting->nama}}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            @else
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
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"><i class="uil-info-circle me-3"></i>Kelola Barang</h5>
                            </div><!-- end card-header -->
                            <div class="card-body">
                                <p class="card-text">Barang <b>{{$data->nama_barang}}</b> ditambahkan pada tanggal
                                    <b>{{$data->created_at->format('d-m-Y')}}</b>.</p>
                                <div class="d-flex" id="tooltip-container">
                                    @if ($data->id_kamera > 0)
                                    <a href="{{route('edit.kamera', $data->id)}}" class="btn btn-sm btn-primary"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Kamera"><i
                                            class="uil-edit"></i> Edit Kamera</a>
                                    <button class="btn btn-sm btn-danger ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Hapus Kamera"
                                        onclick="hapus_kamera({{$data->id}})"><i class="uil-trash-alt"></i> Hapus
                                        Kamera</button>
                                    @else
                                    <a href="{{route('edit.lensa', $data->id)}}" class="btn btn-primary"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Lensa"><i
                                            class="uil-edit"></i></a>
                                    <button class="btn btn-danger ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Hapus Lensa" onclick="hapus_lensa({{$data->id}})"><i
                                            class="uil-trash-alt"></i></button>
                                    @endif
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function hapus_lensa(id) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus barang?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#5B73E8',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F46A6A',
            confirmButtonText: 'Ya!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('hapus.kamera', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }

    function hapus_lensa(id) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus barang?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#5B73E8',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F46A6A',
            confirmButtonText: 'Ya!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('hapus.lensa', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }

</script>

@include('components.btn-back')
@endsection
