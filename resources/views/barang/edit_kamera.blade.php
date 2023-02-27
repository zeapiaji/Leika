@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Edit Kamera</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        <a href="{{route('dasbor')}}">
                            Dasbor
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5> 
                    <h5><a href="{{route('index')}}">Kelola Barang</a></h5>
                    <h5 class="ms-1 me-1">/</h5>
                    <h5>Edit {{$data->nama_barang}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('perbarui.kamera', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-lg-12">
            <div id="addproduct-accordion" class="custom-accordion">
                <div class="card">
                    <a href="#addproduct-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="addproduct-billinginfo-collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            01
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Info Umum Kamera</h5>
                                    <p class="text-muted text-truncate mb-0">Edit atau Perbarui Informasi Umum Produk
                                        Kamera</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="uil-arrow-down font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div id="addproduct-billinginfo-collapse" class="collapse show"
                        data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="namaproduk">Nama Produk</label>
                                        <input id="productname" name="nama_barang" value="{{$data->nama_barang}}"
                                            type="text" class="form-control" placeholder="Masukan Nama Kamera">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Kondisi Barang</label>
                                        <select class="form-control select2" name="kondisi">
                                            <option value="">Pilih</option>
                                            @foreach ($kondisi as $item)
                                            <option value="{{$item->id}}"
                                                {{ ($data->id_kondisi == $item->id) ? 'selected' : ''}}>{{$item->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Kategori</label>
                                        <select class="form-control select2" name="kategori">
                                            <option value="">Pilih</option>
                                            @foreach ($kategori as $item)
                                            <option value="{{$item->id}}"
                                                {{ ($data->id_merek == $item->id) ? 'selected' : ''}}>{{$item->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Merek</label>
                                        <select class="form-control select2" name="merek">
                                            <option value="">Pilih</option>
                                            @foreach ($merek as $item)
                                            <option value="{{$item->id}}"
                                                {{ ($data->id_merek == $item->id) ? 'selected' : ''}}>{{$item->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_rilis">Tanggal Dirilis</label>
                                        <input id="tanggal_rilis" name="tanggal_rilis" type="date"
                                            value="{{$data->tanggal_rilis}}" class="form-control"
                                            placeholder="Masukan Tanggal Rilis Kamera">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6"
                                    placeholder="Masukan Deskripsi Kamera anda">{{$data->deskripsi}}</textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#detail-barang" class="text-dark" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="detail-barang">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            02
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Info Detail Kamera</h5>
                                    <p class="text-muted text-truncate mb-0">Edit atau Perbarui Informasi Detail Produk
                                        Kamera</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="uil-arrow-down font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div id="detail-barang" class="collapse show" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="tipesensor">Tipe Sensor</label>
                                        <input id="tipesensor" name="tipe_sensor" value="{{$data->kamera->tipe_sensor}}"
                                            type="text" class="form-control" placeholder="Masukan Tipe Sensor Kamera">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="jumlahpiksel">Jumlah Piksel</label>
                                        <input id="jumlahpiksel" name="jumlah_piksel"
                                            value="{{$data->kamera->jumlah_piksel}}" type="text" class="form-control"
                                            placeholder="Masukan Jumlah Piksel Kamera">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="baterai">Baterai</label>
                                        <input id="baterai" name="baterai" value="{{$data->kamera->baterai}}"
                                            type="text" class="form-control"
                                            placeholder="Masukan Kapasitas Baterai Kamera">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Tipe Mounting</label>
                                        <select class="form-control select2" name="mounting">
                                            <option value="">Pilih</option>
                                            @foreach ($mounting as $item)
                                            <option value="{{$item->id}}"
                                                {{ ($data->kamera->id_mounting == $item->id) ? 'selected' : ''}}>
                                                {{$item->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <a href="#addproduct-img-collapse" class="text-dark collapsed" data-bs-toggle="collapse"
                        aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                        aria-controls="addproduct-img-collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                            03
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Foto Produk</h5>
                                    <p class="text-muted text-truncate mb-0">Edit atau Perbarui Foto Produk</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="uil-arrow-down font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div class="p-4">
                        <div class="mt-3">
                            <label for="foto_barang">Tambah Gambar</label>
                            <input type="file" class="form-control" id="foto_barang" name="foto_barang[]" multiple>
                            <i class="text-danger fs-6 fw-light">*bila ingin mengganti gambar, centang kolom hapus dan tambah gambar.</i>
                        </div>
                        <div class="row mt-3">
                            @foreach ($foto_barang as $item)
                            <div class="col-3">
                                <div class="card">
                                    <img src="{{asset('storage/'.$item->lokasi_foto)}}" alt=""
                                        class="img-thumbnail mx-auto d-block tab-img rounded" style="max-height: 200px">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <input type="checkbox" name="hapus_gambar[]" value="{{ $item->id }}" id="hapus"> 
                                            <div class="text-danger ms-2 fw-bolder">
                                                Hapus
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    @include('components.btn-submit-cancel')

</form>

<script>
    $(document).ready(function () {
        $('form').ajaxForm(function () {
            alert("Uploaded SuccessFully");
        });
    });

    function preview_image() {
        var total_file = document.getElementById("gambar_produk").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#image_preview').append('<img src="' + URL.createObjectURL(event.target.files[i]) +
                '" width="200px;" height="200px" style="margin-left:10px; margin-top:10px;">');
        }
    }

</script>
@endsection
