@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Kategori</h4>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('unggah.kategori')}}" method="POST">
    @csrf

   <div class="card">
    <div class="card-body">
        <label for="nama">Nama Kategori</label>
    <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
   </div>
    <!-- end row -->

    @include('components.data_lain.btn-submit-cancel')

</form>

@endsection
