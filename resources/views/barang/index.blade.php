@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Data Kamera & Lensa</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        <a href="{{route('index')}}">
                            Kelola Barang
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-item-center">
                    <div class="col-6">
                        <div class="d-flex">
                            <a href="{{route('export.excel')}}" class="btn btn-md btn-success"><i class="uil-table me-2"
                                    style="font-size: "></i> Excel</a>
                            <a href="{{route('export.pdf')}}" class="btn btn-md btn-danger ms-2"><i
                                    class="uil-file-copy-alt me-2"></i> PDF</a>
                        </div>
                    </div>
                    <div class="col-6 me-auto d-flex ">
                        <a href="{{route('tambah.lensa')}}" class="btn btn-md btn-primary ms-auto">
                            <i class="uil-shutter me-2" style="font-size: 15px"></i> Tambah Lensa
                        </a>
                        <a href="{{route('tambah.kamera')}}" class="btn btn-md btn-primary ms-2">
                            <i class="uil-camera-plus me-2" style="font-size: 15px"></i> Tambah Kamera
                        </a>
                    </div>
                </div>
                <div class="mt-3">
                    <table id="datatable" class="table table-bordered"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Tanggal Rilis</th>
                                <th>Kondisi</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($data as $item)
                            <tr role="row " class="odd">
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->merek->nama}}</td>
                                <td>{{$item->tanggal_rilis}}</td>
                                <td>
                                    @if ($item->id_kondisi == 1)
                                    <span class="badge rounded-pill bg-soft-primary">
                                        @elseif($item->id_kondisi == 2)
                                        <span class="badge rounded-pill bg-soft-success">
                                            @elseif($item->id_kondisi == 3)
                                            <span class="badge rounded-pill bg-soft-warning">
                                                @elseif($item->id_kondisi == 4)
                                                <span class="badge rounded-pill bg-soft-danger">
                                                    @endif
                                                    {{$item->kondisi->nama}}</span>
                                </td>
                                <td class="fw-bold">
                                    @if ($item->kategori->status == 1)
                                    <i class="uil-camera text-muted" style="font-size: 20px">
                                        @else
                                        <i class="uil-shutter text-muted" style="font-size: 20px">
                                            @endif
                                        </i>
                                        {{$item->kategori->nama}}
                                </td>
                                <td class="col-1 text-center">
                                    <div class="d-flex gap-1">
                                        <a href="{{route('detail', $item->id)}}" class="btn btn-outline-primary"><i
                                                class="fas fa-eye"></i></a>
                                        @if ($item->id_kamera > 0)
                                        <a href="{{route('edit.kamera', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{route('hapus.kamera', $item->id)}}" class="btn btn-outline-danger"
                                            onclick="hapus_kamera({{$item->id}})"><i class="fas fa-trash-alt"></i></a>
                                        @else
                                        <a href="{{route('edit.lensa', $item->id)}}" class="btn btn-outline-success"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-outline-danger"
                                            onclick="hapus_lensa({{$item->id}})">
                                            <i class="fas fa-trash-alt"></i></button>
                                        @endif
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
<!-- end row -->
<script>
    function hapus_kamera(id) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus kamera?',
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
            title: 'Anda yakin ingin menghapus lensa?',
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

@endsection
