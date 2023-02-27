@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Tambah Merek</h4>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('perbarui.merek', $data->id)}}" method="POST">
    @csrf
    @method('PUT')

   <div class="card">
    <div class="card-body">
        <label for="nama">Nama Merek</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
    </div>
   </div>
    <!-- end row -->

    @include('components.data_lain.btn-submit-cancel')

</form>

@endsection
