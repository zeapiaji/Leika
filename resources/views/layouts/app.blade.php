<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    @include('layouts.css')
    
    <style>
    body[data-layout=horizontal] .page-content {
        margin-top: 70px;
    padding: calc(80px + 1.25rem) calc(1.25rem / 2) 60px calc(1.25rem / 2)
}
    </style>

</head>

@include('sweetalert::alert')

@guest

<body class="{{ (request()->is('login')) ? 'login-bg' : 'register-bg' }}">
    <div class="account-pages my-4 pt-sm-5">
        @yield('auth')
    </div>
</body>
@endguest

@auth

<body data-layout="horizontal" data-topbar="colored" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('components.navbar')
            <div class="container-fluid">
                @include('components.topnav')
            </div>
        </header>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
            @include('components.footer')


        </div>
    </div>

    @include('layouts.js')

</body>
@endauth

</html>
