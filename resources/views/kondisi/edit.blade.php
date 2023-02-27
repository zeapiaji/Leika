@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Edit Kondisi</h4>

        </div>
    </div>
</div>
<!-- end page title -->

<form action="{{route('perbarui.kondisi', $data->id)}}" method="POST">
    @csrf
    @method('PUT')

   <div class="card">
    <div class="card-body">
        <label for="nama">Nama Kondisi</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
    </div>
   </div>
    <!-- end row -->

    @include('components.data_lain.btn-submit-cancel')

</form>

@endsection
