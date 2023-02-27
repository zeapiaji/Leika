@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Kamera</h4>
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
                    <h5>Tambah Kamera</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('unggah.kamera')}}" method="POST" enctype="multipart/form-data" class="custom-validation">
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
                                    <h5 class="font-size-16 mb-1">Info Umum Lensa</h5>
                                    <p class="text-muted text-truncate mb-0">Tambahkan Informasi Umum Produk
                                        Lensa</p>
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
                                        <input id="productname" name="nama_barang" type="text"
                                            class="form-control @error('nama_barang') is-invalid @enderror"
                                            value="{{old('nama_barang')}}"
                                            placeholder="Masukan Nama Lensa" required
                                            data-parsley-error-message="Nama produk harus diisi!">
                                        @error('nama_barang')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Kondisi Barang</label>
                                        <select class="form-control select2 @error('kondisi') is-invalid @enderror" name="kondisi" required
                                            data-parsley-errors-container="#kondisi-error"
                                            data-parsley-error-message="Pilih kondisi barang!">
                                            <option value="">Pilih</option>
                                            @foreach ($kondisi as $item)
                                            <option value="{{$item->id}}" {{$item->id == old('kondisi') ? 'selected' : ''}}>{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        <div id="kondisi-error"></div>
                                        @error('kondisi')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Kategori</label>
                                        <select class="form-control select2 @error('kategori') is-invalid @enderror" name="kategori" required
                                            data-parsley-errors-container="#kategori-error"
                                            data-parsley-error-message="Pilih kategori barang!">
                                            <option value="">Pilih</option>
                                            @foreach ($kategori as $item)
                                            <option value="{{$item->id}}" {{$item->id == old('kategori') ? 'selected' : ''}}>{{$item->nama}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div id="kategori-error"></div>
                                        @error('kategori')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Merek</label>
                                        <select class="form-control select2 @error('merek') is-invalid @enderror" name="merek" required
                                        data-parsley-errors-container="#merek-error"
                                        data-parsley-error-message="Pilih merek barang!">
                                            <option value="">Pilih</option>
                                            @foreach ($merek as $item)
                                            <option value="{{$item->id}}" {{$item->id == old('merek') ? 'selected' : ''}}>{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('merek')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div id="merek-error"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="mb-3">
                                        <label class="form-label" for="tanggal_rilis">Tanggal Dirilis</label>
                                        <input id="tanggal_rilis" name="tanggal_rilis" type="date" 
                                        class="form-control @error('tanggal_rilis') is-invalid @enderror"
                                        value="{{old('tanggal_rilis')}}"
                                            placeholder="Masukan Tanggal Rilis Lensa" required
                                            data-parsley-error-message="Pilih tanggal diliris barang!">
                                        @error('tanggal_rilis')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                                <textarea required class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="6"
                                    placeholder="Masukan Deskripsi Lensa anda"
                                    data-parsley-error-message="Deskripsi harus diisi!">{{old('deskripsi')}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
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
                                    <h5 class="font-size-16 mb-1">Info Detail Produk</h5>
                                    <p class="text-muted text-truncate mb-0">Tambah Informasi Detail Produk
                                        Produk</p>
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
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="shutter_count">Shutter Count</label>
                                        <input id="shutter_count" name="shutter_count" type="number" class="form-control @error('shutter_count') is-invalid @enderror"
                                        value="{{old('shutter_count')}}"
                                        placeholder="Masukan SC Kamera" required
                                        data-parsley-error-message="SC kamera harus diisi!">
                                        @error('shutter_count')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tipesensor">Tipe Sensor</label>
                                        <input id="tipesensor" name="tipe_sensor" type="text" class="form-control @error('tipe_sensor') is-invalid @enderror"
                                        value="{{old('tipe_sensor')}}"
                                        placeholder="Masukan Tipe Sensor Kamera" required
                                        data-parsley-error-message="Tipe sensor produk harus diisi!">
                                        @error('tipe_sensor')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="jumlahpiksel">Jumlah Piksel</label>
                                        <input id="jumlahpiksel" name="jumlah_piksel" type="text" class="form-control @error('jumlah_piksel') is-invalid @enderror input-mask text-start"
                                        value="{{old('jumlah_piksel')}}"
                                        placeholder="Masukan Jumlah Piksel Kamera" required
                                        data-inputmask="'alias': 'numeric', 'suffix': ' MP', 'placeholder': '0'"
                                        data-parsley-error-message="Jumlah piksel harus diisi!">
                                        @error('jumlah_piksel')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="baterai">Baterai</label>
                                        <input id="baterai" name="baterai" type="text" class="form-control @error('baterai') is-invalid @enderror input-mask text-start"
                                        value="{{old('baterai')}}"
                                        required
                                        data-inputmask="'alias': 'numeric', 'suffix': ' Shots', 'placeholder': '0'"
                                        placeholder="Masukan Daya Baterai"
                                        data-parsley-error-message="Kapasitas baterai produk harus diisi!">
                                        @error('baterai')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" class="control-label">Tipe Mounting</label>
                                        <select class="form-control select2 @error('mounting') is-invalid @enderror" name="mounting"
                                        value="{{old('mounting')}}"
                                            placeholder="Pilih Mounting Kamera" required
                                            data-parsley-errors-container="#mounting_error"
                                            data-parsley-error-message="Pilih mounting diliris barang!">
                                            <option value="">Pilih</option>
                                            @foreach ($mounting as $item)
                                            <option value="{{$item->id}}">{{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        <div id="mounting_error"></div>
                                        @error('mounting')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
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
                                    <p class="text-muted text-truncate mb-0">Tambah Foto Produk</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="uil-arrow-down font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                            <center>
                                <div id="image_preview"></div>
                            </center>
                            <div class="mt-3">
                                <label for="files" class="form-label">Masukan Gambar</label>
                                <input class="form-control" name="gambar_produk[]" type="file" id="gambar_produk" onchange="preview_image();" multiple >
                                <p class="text-muted fw-light">*Block file yang akan diupload untuk memasukan banyak gambar.
                            </div>
                            </p>
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
    $(document).ready(function() 
    { 
     $('form').ajaxForm(function() 
     {
      alert("Uploaded SuccessFully");
     }); 
    });
    
    function preview_image() 
    {
     var total_file=document.getElementById("gambar_produk").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append('<img src="'+URL.createObjectURL(event.target.files[i])+'" width="200px;" height="200px" style="margin-left:10px; margin-top:10px;">');
     }
    }
</script>
@endsection
