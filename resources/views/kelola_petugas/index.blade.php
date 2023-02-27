@extends('layouts.app')

@section('content')


<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row align-item-center">
                <div class="col-4">
                    <h3 class="fw-bolder">Data Petugas</h3>
                </div>
                <div class="col-4 ms-auto d-flex">
                    <a href="{{route('petugas.tambah')}}" class="btn btn-md btn-primary ms-auto">
                        <i class="uil-shutter me-2" style="font-size: 15px"></i> Tambah Petugas
                    </a>
                </div>
            </div>
            <div class="mt-3">
                <table id="datatable" class="table table-bordered"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Profil</th>
                            <th>Nama Petugas</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr role="row " class="odd">
                            <td>{{$no++}}</td>
                            <td class="text-center">
                                @if (Storage::exists($item->foto_profil))
                                <img src="{{asset('storage/'.$item->foto_profil)}}" alt="" height="100" width="80">    
                                @else
                                <img src="{{asset('images/users/default.png')}}" alt="" height="100" width="80">    
                                @endif
                            </td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->telp}}</td>
                            <td class="col-1 text-center">
                                <div class="d-flex gap-1" id="tooltip-container-{{$item->id}}">
                                    {{-- <a href="" class="btn btn-primary" item-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Petugas"><i class="uil-eye" ></i></a> --}}
                                    <a href="{{route('petugas.edit', $item->id)}}" class="btn btn-success" item-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Petugas"><i class="uil-edit" ></i></a>
                                    <a class="btn btn-danger" onclick="hapus_petugas({{$item->id}})" item-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Petugas"><i class="uil-trash-alt"></i></a>
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
<!-- end row -->
<script>
    function hapus_petugas(id) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus petugas?',
            icon: 'question',
            showCancelButton: true,
            cancelButtonColor: '#5B73E8',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F46A6A',
            confirmButtonText: 'Ya!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('petugas.hapus', ['id' => ':id']) }}".replace(':id', id);
            }
        })
    }

</script>

@endsection
