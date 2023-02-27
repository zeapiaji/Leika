@extends('layouts.guest')
@section('landing_page')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Profil</h4>
            <div class="page-title-right">
                <div class="d-flex">
                    <h5 class="text-dark">
                        @role('masyarakat')
                        <a href="/">
                            Halaman Utama
                        @endrole
                        @role('petugas||admin')
                        <a href="{{route('dasbor')}}">
                            Dasbor
                        @endrole
                        </a>
                    </h5>
                    <h5 class="ms-1 me-1">/</h5> 
                    <h5>Profil</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row mb-4">
    <div class="col-xl-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="text-center">
                    <div class="clearfix"></div>
                    <div>
                        @if (Storage::exists(Auth::user()->foto_profil))    
                        <img src="{{asset('storage/'. Auth::user()->foto_profil)}}" alt=""
                            class="avatar-lg rounded-circle img-thumbnail">
                        @else
                        <img src="{{asset('images/users/default.png')}}" alt=""
                            class="avatar-lg rounded-circle img-thumbnail">
                        @endif
                    </div>
                    <h5 class="mt-3 mb-1">{{Auth::user()->username}}</h5>
                    @role('admin')    
                    <div class="">
                        <p class="fs-6">Admin</p>
                    </div>
                    @endrole
                    @role('petugas')
                    <div class="">
                        <p class="fs-6">Petugas Lelang</p>
                    </div>
                    @endrole
                </div>

                <hr class="my-4">

                <div class="text-muted">
                    <div class="table-responsive mt-4">
                        <div>
                            <p class="mb-1">Nama :</p>
                            <h5 class="font-size-16">{{Auth::user()->nama_lengkap}}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">Nomor Telepon :</p>
                            <h5 class="font-size-16">{{Auth::user()->telp}}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">Email :</p>
                            <h5 class="font-size-16">{{Auth::user()->email}}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">Usia :</p>
                            <h5 class="font-size-16">{{Auth::user()->usia}}</h5>
                        </div>
                        <div class="mt-4">
                            <p class="mb-1">Alamat :</p>
                            <h5 class="font-size-16">{{Auth::user()->alamat}}</h5>
                        </div>
                        <div class="mt-4">
                            <p>Anda bergabung dengan pada {{Auth::user()->created_at->format('d-m-Y')}}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card mb-0">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                @role('masyarakat')
                <li class="nav-item">
                    <a class="nav-link @role('masyarakat') active @endrole" data-bs-toggle="tab" href="#about" role="tab">
                        <i class="uil uil-file-alt font-size-20"></i>
                        <span class="d-none d-sm-block">Riwayat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#inbox" role="tab">
                        <i class="uil uil-file-alt font-size-20"></i>
                        <span class="d-none d-sm-block">Inbox</span>
                    </a>
                </li>
                @endrole
                <li class="nav-item">
                    <a class="nav-link @role('petugas||admin') active @endrole" data-bs-toggle="tab" href="#tasks" role="tab">
                        <i class="uil uil-edit font-size-20"></i>
                        <span class="d-none d-sm-block">Edit Profil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                        <i class="uil uil-user font-size-20"></i>
                        <span class="d-none d-sm-block">Sandi & Pengaturan Akun</span>
                    </a>
                </li>
            </ul>
            <!-- Tab content -->
            <div class="tab-content p-4">
                @role('masyarakat')
                <div class="tab-pane active" id="about" role="tabpanel">
                        <div>
                            <div class="d-flex">
                                <h5 class="font-size-16 mb-4">Riwayat Lelang</h5>
                            </div>
                            <ul class="activity-feed mb-0 ps-2">
                                @foreach ($penawaran as $item)    
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <p class="text-muted mb-1">{{$item->created_at}}</p>
                                        <h5 class="font-size-16">{{$item->lelang->barang->nama_barang}}</h5>
                                        <p>Anda melakukan penawaran sebesar {{$item->harga_penawaran}}</p>
                                        <p class="text-muted"><a href="{{route('lihat_lelang', $item->lelang->id_barang)}}">Lihat Lelang</a></p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="row">
                                {{$penawaran->links()}}
                            </div>
                        </div>
                </div>
                <div class="tab-pane" id="inbox" role="tabpanel">
                    <div>
                        <div class="d-flex">
                            <h5 class="font-size-16 mb-4">Inbox</h5>
                        </div>
                        <ul class="activity-feed mb-0 ps-2">
                            @foreach ($inbox as $item)    
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <p class="text-muted mb-1">{{$item->created_at}}</p>
                                    <h5 class="font-size-16">Selamat anda memenangkan lelang <b>{{$item->barang->nama_barang}}!</b></h5>
                                    <p>Anda memenangkan {{$item->barang->nama_barang}} dengan penawaran sebesar Rp {{$item->penawaran_harga}}</p>
                                    <div class="d-flex">
                                        <p class="text-muted"><a href="{{route('lihat_inbox', $item->id)}}">Lihat Inbox</a></p>
                                        <p class="text-muted ms-5"><a href="{{route('lihat_invoice', $item->id)}}">Lihat Invoice</a></p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="row">
                            {{$inbox->links()}}
                        </div>
                    </div>
                </div>
                @endrole
                <div class="tab-pane @role('petugas||admin') active @endrole" id="tasks" role="tabpanel">
                    <h5 class="font-size-16 mb-4">Edit Profil</h5>
                    <form action="{{route('perbarui_profil', Auth::user()->id)}}" method="POST" class="mt-4"
                        enctype="multipart/form-data" class="custom-validation">
                        @csrf
                        @method('PUT')
                        <div class="row g-5">
                            <div class="col-6">         
                                <center>
                                    <div id="image_preview" class="img-thumbnail"></div>
                                </center>
                                <div class="mb-3">
                                    <label class="form-label" for="foto_profil">Foto Profil</label>
                                    <input type="file" name="foto_profil"
                                        class="form-control @error('foto_profil') is-invalid @enderror" id="foto_profil" onchange="preview_image();"
                                        autofocus>

                                    @error('foto_profil')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="username">Nama Pengguna</label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{old('username', Auth::user()->username)}}" id="username"
                                        placeholder="Masukan Nama Pengguna Anda" required autocomplete="username"
                                        autofocus>

                                    @error('username')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="useremail">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{old('email', Auth::user()->email)}}" id="useremail"
                                        placeholder="Masukan Email Anda" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{old('nama_lengkap', Auth::user()->nama_lengkap)}}" id="nama_lengkap"
                                        placeholder="Masukan Nama Lengkap Anda" required autocomplete="nama_lengkap"
                                        autofocus>

                                    @error('nama_lengkap')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="telp">Nomor Telepon</label>
                                    <input type="text" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{old('telp', Auth::user()->telp)}}" id="telp"
                                        placeholder="Masukan Nomor Telepon Anda" required autocomplete="telp" autofocus>

                                    @error('telp')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="usia">Usia</label>
                                    <input type="text" name="usia"
                                        class="form-control @error('usia') is-invalid @enderror"
                                        value="{{old('usia', Auth::user()->usia)}}" id="usia"
                                        placeholder="Masukan Usia Anda" required autocomplete="name" autofocus>

                                    @error('usia')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="username">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="3"
                                        class="form-control">{{Auth::user()->alamat}}</textarea>
                                    @error('alamat')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mt-3 text-end">
                            <button class="btn btn-primary w-sm waves-effect waves-light mt-2"
                                type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel">
                    <h5 class="font-size-16 mb-4">Sandi & Pengaturan Akun</h5>
                    <div class="row">
                        <div class="col-8">
                            <form action="{{route('edit_user_password', Auth::user()->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="card border ">
                                    <div class="card-header ">
                                        <h5>
                                            <i class="uil-edit"></i>
                                            Buat Ulang Sandi
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Sandi</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="userpassword" required autocomplete="new-password"
                                                placeholder="Buat Sandi Anda">
                                            @error('password')
                                            <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Konfirmasi Sandi</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="userpassword" placeholder="Ketik Ulang Sandi" required
                                                autocomplete="new-password">
                                        </div>

                                        <div class="text-end mt-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    @role('masyarakat')
                    <div class="col-4">
                        <div class="card border border-danger">
                            <div class="card-header bg-danger">
                                <h5 class="text-light">
                                    <i class="uil-exclamation-octagon me-2"></i> Tutup Akun
                                </h5>
                            </div>
                            <div class="card-body">
                                *Bila akun ditutup, akun tidak bisa dikembalikan! <br>
                                <div class="text-end mt-3">
                                    <a href="{{route('hapus_akun', Auth::user()->id)}}" class="btn btn-sm btn-danger ms-auto">Tutup Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>

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
     var total_file=document.getElementById("foto_profil").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append('<img src="'+URL.createObjectURL(event.target.files[i])+'" width="200px;" height="200px" style="margin-left:10px; margin-top:10px; margin-botton:10px;">');
     }
    }
</script>
@endsection
