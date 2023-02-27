@extends('layouts.app')

@section('auth')


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="/" class="mb-5 d-block auth-logo">
                        <img src="{{asset('images/logo-light.png')}}" alt="" height="22" >
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Selamat Datang Kembali !</h5>
                            <p class="text-muted">Login untuk melanjutkan ke E-Lelang.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{route('login')}}">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label" for="name">Email Pengguna</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan email pengguna" value="{{old('email')}}" autocomplete autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Sandi</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Masukan sandi" autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="auth-remember-check">
                                    <label class="form-check-label" for="auth-remember-check">Ingat saya</label>
                                </div>


                                <div class="mt-3 text-end">
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Login</button>
                                </div>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Tidak punya akun ? <a href="{{route('register')}}" class="fw-medium text-primary"> Daftar sekarang </a> </p>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>

@endsection
