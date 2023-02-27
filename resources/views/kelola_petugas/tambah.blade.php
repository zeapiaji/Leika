@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="font-size-16 mb-4">Edit Profil</h5>
    <form action="{{route('petugas.unggah')}}" method="POST" class="mt-4"
        enctype="multipart/form-data">
        @csrf
        <div class="row g-5">
            <div class="col-6">
                <center>
                    <div id="image_preview" class="img-thumbnail"></div>
                </center>
                <div class="mb-3">
                    <label class="form-label" for="foto_profil">Foto Profil</label>
                    <input type="file" name="foto_profil" class="form-control @error('foto_profil') is-invalid @enderror"
                        id="foto_profil" onchange="preview_image();" autofocus>

                    @error('foto_profil')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="username">Nama Pengguna</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        value="{{old('username')}}" id="username"
                        placeholder="Masukan Nama Pengguna Anda" required autocomplete="username" autofocus>

                    @error('username')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="username">Email</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{old('email')}}" id="email"
                        placeholder="Masukan Nama Pengguna Anda" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="userpassword">Sandi</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" id="userpassword"
                        required autocomplete="new-password" placeholder="Buat Sandi Anda">
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

            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                        value="{{old('nama_lengkap')}}" id="nama_lengkap"
                        placeholder="Masukan Nama Lengkap Anda" required autocomplete="nama_lengkap" autofocus>

                    @error('nama_lengkap')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="telp">Nomor Telepon</label>
                    <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror"
                        value="{{old('telp')}}" id="telp" placeholder="Masukan Nomor Telepon Anda"
                        required autocomplete="telp" autofocus>

                    @error('telp')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="usia">Usia</label>
                    <input type="number" name="usia" class="form-control @error('usia') is-invalid @enderror"
                        value="{{old('usia')}}" id="usia" placeholder="Masukan Usia Anda" required
                        autocomplete="name" autofocus>

                    @error('usia')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="username">Alamat</label>
                    <textarea name="alamat" id="" cols="30" rows="3"
                        class="form-control">{{old('username')}}</textarea>
                    @error('alamat')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="mt-3 text-end">
            <button class="btn btn-primary w-sm waves-effect waves-light mt-2" type="submit">Simpan</button>
        </div>

    </form>
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
      $('#image_preview').append('<img src="'+URL.createObjectURL(event.target.files[i])+'" width="200px;" height="200px" style="margin-left:10px; margin-top:10px;">');
     }
    }
</script>
@endsection
