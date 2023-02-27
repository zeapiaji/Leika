@extends('layouts.app')

@section('auth')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <a href="/" class="mb-5 d-block auth-logo">
                    <img src="{{asset('images/logo-leika.png')}}" alt="" height="70">
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="card">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Buat Akun</h5>
                    <p class="text-muted">Buat akun terlebih dahulu sebelum lanjut ke E-Lelang.</p>
                </div>
                <form action="{{route('register')}}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-5">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label" for="username">Nama Pengguna</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                    value="{{old('username')}}" id="username" placeholder="Masukan Nama Pengguna Anda" required
                                    autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="useremail">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"
                                    id="useremail" placeholder="Masukan Email Anda" required autocomplete="email">

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
                                <input type="text" name="nama_lengkap"
                                    class="form-control @error('name') is-invalid @enderror" value="{{old('nama_lengkap')}}"
                                    id="nama_lengkap" placeholder="Masukan Nama Lengkap Anda" required autocomplete="nama_lengkap"
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
                                    class="form-control @error('telp') is-invalid @enderror" value="{{old('telp')}}"
                                    id="telp" placeholder="Masukan Nomor Telepon Anda" required autocomplete="telp"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="usia">Usia</label>
                                <input type="text" name="usia"
                                    class="form-control @error('usia') is-invalid @enderror" value="{{old('usia')}}"
                                    id="usia" placeholder="Masukan Usia Anda" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="foto_profil">Foto Profil</label>
                                <input type="file" name="foto_profil"
                                    class="form-control @error('name') is-invalid @enderror" id="foto_profil" autofocus>

                                @error('foto_profil')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="username">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                                @error('alamat')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mt-3 text-end">
                        <p class="text-muted mb-0">Sudah punya akun ? <a href="{{route('login')}}"
                            class="fw-medium text-primary"> Masuk disini</a></p>
                        <button class="btn btn-primary w-sm waves-effect waves-light mt-2" type="submit">Daftar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- end row -->

{{-- <div class="mt-5 text-center">
    <p>© <script>
            document.write(new Date().getFullYear())

        </script> E-Lelang. dibuat oleh Zea Piaji</p>
</div> --}}
@endsection
