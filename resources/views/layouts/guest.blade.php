<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.css')


    <style>
        body[data-layout=horizontal] .page-content {
        padding: calc(80px + 1.25rem) calc(1.25rem / 2) 60px calc(1.25rem / 2)
    }
    </style>
</head>


<body data-layout="horizontal" data-topbar="colored" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            @include('components.navbar')
            
        </header>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('landing_page')

                </div>
            </div>
            @include('components.footer')


        </div>
    </div>

    @include('layouts.js')

</body>

</html>
