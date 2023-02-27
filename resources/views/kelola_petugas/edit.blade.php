@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="font-size-16 mb-4">Edit Profil</h5>
    <form action="{{route('petugas.perbarui', $data->id)}}" method="POST" class="mt-4"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                        value="{{old('username', $data->username)}}" id="username"
                        placeholder="Masukan Nama Pengguna Anda" required autocomplete="username" autofocus>

                    @error('username')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                        value="{{old('nama_lengkap', $data->nama_lengkap)}}" id="nama_lengkap"
                        placeholder="Masukan Nama Lengkap Anda" required autocomplete="nama_lengkap" autofocus>

                    @error('nama_lengkap')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="telp">Nomor Telepon</label>
                    <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror"
                        value="{{old('telp', $data->telp)}}" id="telp" placeholder="Masukan Nomor Telepon Anda"
                        required autocomplete="telp" autofocus>

                    @error('telp')
                    <span class="invalid-feedback">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="usia">Usia</label>
                    <input type="text" name="usia" class="form-control @error('usia') is-invalid @enderror"
                        value="{{old('usia', $data->usia)}}" id="usia" placeholder="Masukan Usia Anda" required
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
                        class="form-control">{{$data->alamat}}</textarea>
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
