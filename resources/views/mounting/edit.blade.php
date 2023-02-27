@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Edit Mounting</h4>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('perbarui.merek', $data->id)}}" method="POST">
    @csrf
    @method('PUT')

   <div class="card">
    <div class="card-body">
        <label for="nama">Nama Mounting</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
    </div>
   </div>
    <!-- end row -->

    <div class="row mb-4">
        <div class="col ms-auto">
            <div class="d-flex flex-reverse flex-wrap gap-2">
                <a href="{{route('data_pendukung')}}" class="btn btn-danger"> <i class="uil uil-times"></i> Batal </a>
                <button type="submit" class="btn btn-success"> <i class="uil uil-file-alt"></i>
                    Simpan </button>
            </div>
        </div> <!-- end col -->
    </div>

</form>

@endsection
