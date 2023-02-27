@extends('layouts.app')

@section('content')


<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Kelola Barang untuk Dilelang</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="card">
        <div class="card-body">
            <div>
                   
                <div class="row">
                    @foreach ($data as $item)
                    <div class="col-xl-4 col-sm-6">
                        <div class="product-box">
                            <div class="product-img pt-4 px-4">
                                @if ($item->id_kondisi == 1)
                                <div class="product-ribbon badge bg-primary">
                                    @elseif ($item->id_kondisi == 2)
                                    <div class="product-ribbon badge bg-success">
                                        @elseif ($item->id_kondisi == 3)
                                        <div class="product-ribbon badge bg-warning">
                                            @else
                                            <div class="product-ribbon badge bg-danger">
                                                @endif
                                                {{$item->kondisi->nama}}
                                            </div>
                                            @if (isset($item->lelang) && $item->lelang->status == 1)
                                            <div class="d-flex flex-row-reverse">
                                                <div class="badge bg-primary">
                                                    Sedang Dilelang
                                                </div>
                                            </div>
                                            @elseif (isset($item->lelang) && $item->lelang->status == 2)
                                            <div class="d-flex flex-row-reverse">
                                                <div class="badge bg-warning">
                                                    Lelang Telah Berakhir
                                                </div>
                                            </div>
                                            @else
                                            <div class="d-flex flex-row-reverse">
                                                <div class="badge bg-danger">
                                                    Tidak Dilelang
                                                </div>
                                            </div>
                                            @endif
    
                                            @if ($item->foto_barang->count() > 0)
                                            <img src="{{asset('storage/'.$item->foto_barang->first()->lokasi_foto)}}"
                                                alt="" style="height: 200px" class="img-fluid mx-auto d-block">
                                            @else
                                            <img src="{{asset('images/product/img-1.png')}}" alt=""
                                                style="height: 200px" class="img-fluid mx-auto d-block">
                                            @endif
                                        </div>
    
                                        <div class="text-center product-content p-4">
    
                                            <h5 class="mb-1"><a href="#"
                                                    class="text-dark">{{$item->nama_barang}}</a></h5>
                                            <p class="text-muted text-bolder">@if ($item->kategori->status == 1)
                                                <i class="uil-camera"></i>
                                                @else
                                                <i class="uil-shutter"></i>
                                                @endif
                                                {{$item->kategori->nama}}
                                            </p>
                                            @if (isset($item->lelang) && $item->lelang->status == 1)
                                            <h5 class="mt-3 mb-0">
                                                <span class="text-muted me-2 fs-6">
                                                    <i
                                                        class="uil-users-alt"></i>{{$item->lelang->penawaran ? $item->lelang->penawaran->count() : '0'}}
                                                </span>
                                                <span class="fw-bolder">
                                                    <i class="uil-money-withdraw"></i>
                                                    {{$item->lelang->harga_tertinggi}}
                                                </span>
                                            </h5>
                                            @elseif(isset($item->lelang) && $item->lelang->status == 2)
                                            <h6 class="text-muted">
                                                Lelang telah berakhir
                                            </h6>
                                            @else
                                            <h6 class="text-muted">
                                                Barang sedang tidak dilelang
                                            </h6>
                                            @endif
                                            <ul class="list-inline mb-0 text-muted product-color" id="tooltip-container-{{$item->id}}">
                                                @if (isset($item->lelang) && $item->lelang->status == 1)
                                                <a href="{{$item->id_kamera > 0 ? route('edit.kamera', $item->id) : route('edit.lensa', $item->id)}}" class="btn btn-sm btn-success" item-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Barang"><i class="uil-edit"></i></a>
                                                <button type="button"
                                                    class="btn btn-sm btn-danger waves-effect waves-light"
                                                    onclick="tutup_lelang({{$item->id}})"><i class="uil-padlock"></i> Tutup
                                                    Lelang</button>
                                                <a href="{{route('lihat_lelang', $item->id)}}" class="btn btn-sm btn-primary" data-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Lelang"><i class="uil-eye"></i></a>
                                                @elseif(isset($item->lelang) && $item->lelang->status == 2)
                                                <a href="{{route('lihat_lelang', $item->id)}}" class="btn btn-sm btn-primary" data-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Lelang"><i class="uil-eye"></i></a>
                                                @else
                                                <a href="{{$item->id_kamera > 0 ? route('edit.kamera', $item->id) : route('edit.lensa', $item->id)}}" class="btn btn-sm btn-success" item-bs-container="#tooltip-container-{{$item->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Barang"><i class="uil-edit"></i></a>
                                                <a href="{{route('lelang_barang', $item->id)}}"
                                                    class="btn btn-sm btn-primary"><i class="uil-unlock-alt"></i>
                                                    Buka Lelang</a>
                                                    @if (isset($item->lelang))
                                                    <a href="{{route('akhiri_lelang', $item->id)}}"
                                                        class="btn btn-sm btn-warning"><i class="uil-padlock"></i>
                                                        Akhiri Lelang</a>
                                                    @endif
                                                @endif
                                            </ul>
    
                                        </div>
                                    </div>
                                </div>
                                
    
                                @endforeach
                            </div>
                            <!-- end row -->
    
                            <div class="row mt-4">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>
    <script>
        function tutup_lelang(id) {
          Swal.fire({
            title: 'Anda yakin ingin menutup lelang?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#5B73E8',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#F46A6A',
            confirmButtonText: 'Ya, tutup lelang!',
          }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('tutup_lelang', ['id' => ':id']) }}".replace(':id', id);
            }
          })
        }
    </script>



@endsection
