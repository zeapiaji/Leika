<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-danger"></i> <span class="align-middle text-danger">Keluar</span></a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<h1>hello {{Auth::user()->nama_lengkap}}</h1>
</body>
</html>