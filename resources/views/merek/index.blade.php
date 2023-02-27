@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Data Pendukung</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        <a href="{{route('dasbor')}}">
                            Dasbor
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5> 
                    <h5>Data Pendukung</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="fw-bolder">Data Merek</h3>
                    <a href="{{route('tambah.merek')}}" class="btn btn-md btn-primary ms-auto">
                        <i class="uil-store-alt me-2" style="font-size: 15px"></i> Tambah Merek
                    </a>
                </div>
                <div class="mt-3">
                    <table id="datatable" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Merek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($merek as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('edit.merek', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('hapus.merek', $item->id) }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('delete-form-{{$item->id}}').submit();" class="btn btn-outline-danger ms-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <!-- Form untuk menghapus data -->
                                        <form id="delete-form-{{$item->id}}"
                                            action="{{ route('hapus.merek', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="fw-bolder">Data Mounting Kamera & Lensa</h3>
                    <a href="{{route('tambah.mounting')}}" class="btn btn-md btn-primary ms-auto">
                        <i class="uil-horizontal-distribution-center me-2" style="font-size: 15px"></i> Tambah Mounting
                    </a>
                </div>
                <div class="mt-3">
                    <table id="datatable-1" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Mounting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($mounting as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('edit.mounting', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('hapus.mounting', $item->id) }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('delete-form-{{$item->id}}').submit();" class="btn btn-outline-danger ms-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <!-- Form untuk menghapus data -->
                                        <form id="delete-form-{{$item->id}}"
                                            action="{{ route('hapus.mounting', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="fw-bolder">Data Kategori</h3>
                    <a href="{{route('tambah.kategori')}}" class="btn btn-md btn-primary ms-auto">
                        <i class="uil-sitemap me-2" style="font-size: 15px"></i> Tambah Kategori
                    </a>
                </div>
                <div class="mt-3">
                    <table id="datatable-2" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kategori as $item)
                            <tr>
                                <td class="fw-bolder">
                                    @if ($item->status == 1)
                                    <i class="uil-camera text-muted" style="font-size: 20px">
                                        @else
                                        <i class="uil-shutter text-muted" style="font-size: 20px">
                                            @endif
                                        </i>
                                        {{$item->nama}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('edit.kategori', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('hapus.kategori', $item->id) }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('delete-form-{{$item->id}}').submit();" class="btn btn-outline-danger ms-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <!-- Form untuk menghapus data -->
                                        <form id="delete-form-{{$item->id}}"
                                            action="{{ route('hapus.kategori', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="fw-bolder">Data Kondisi Barang</h3>
                    <a href="{{route('tambah.kondisi')}}" class="btn btn-md btn-primary ms-auto">
                        <i class="uil-question-circle me-2" style="font-size: 15px"></i> Tambah Kondisi
                    </a>
                </div>
                <div class="mt-3">
                    <table id="datatable-3" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kondisi as $item)
                            <tr>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('edit.kondisi', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('hapus.kondisi', $item->id) }}"
                                            onclick="event.preventDefault();
                                                             document.getElementById('delete-form-{{$item->id}}').submit();" class="btn btn-outline-danger ms-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <!-- Form untuk menghapus data -->
                                        <form id="delete-form-{{$item->id}}"
                                            action="{{ route('hapus.kondisi', $item->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <thead>
                    </table>
                </div>

            </div>
        </div> <!-- end col -->
    </div>

</div>



@endsection
