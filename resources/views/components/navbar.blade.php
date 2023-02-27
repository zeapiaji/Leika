<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <div class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{asset('images/logo-leika.png')}}" alt="" height="40">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('images/logo-leika.png')}}" alt="" height="50">
                </span>
            </div>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <!-- App Search-->
        {{-- <form class="app-search d-none d-lg-block" method="GET" >
            <div class="position-relative d-flex    ">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="uil-search"></span>

            </div>
        </form> --}}
    </div>

    <div class="d-flex">

        <div class="dropdown d-inline-block d-lg-none ms-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="uil-search"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-search-dropdown">

                <form class="p-3">
                    <div class="m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="uil-apps"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <div class="px-lg-2">
                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/github.png" alt="Github">
                                <span>GitHub</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                <span>Bitbucket</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                <span>Dribbble</span>
                            </a>
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                <span>Dropbox</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                <span>Mail Chimp</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="#">
                                <img src="assets/images/brands/slack.png" alt="slack">
                                <span>Slack</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="dropdown d-none d-lg-inline-block ms-1">
            <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                <i class="uil-minus-path"></i>
            </button>
        </div>
        
        @guest
        <div class="d-flex">
            <button type="button" class="btn header-item waves-effect">
                <a href="{{route('login')}}" class="text-light fw-bolder fs-5">
                    Masuk
                </a>
            </button>
            <button type="button" class="btn header-item waves-effect">
                <a href="{{route('register')}}" class="text-light fw-bolder fs-5">
                    Daftar
                </a>
            </button>
        </div>
        @endguest

        @auth
          
        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (Storage::exists(Auth::user()->foto_profil))
                <img class="rounded-circle header-profile-user" src="{{asset('storage/'. Auth::user()->foto_profil)}}"
                    alt="Header Avatar">
                @else
                <img class="rounded-circle header-profile-user" src="{{asset('images/users/default.png')}}"
                    alt="Header Avatar">
                @endif
                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">{{Auth::user()->username}}</span>
                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
            <a class="dropdown-item" href="{{route('lihat_profil', Auth::user()->id)}}"><i class="uil uil-user-circle font-size-18 align-middle text-muted me-1"></i> <span class="align-middle">Lihat Profil</span></a>
                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-danger"></i> <span class="align-middle text-danger">Keluar</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        @endauth

    </div>
</div>
