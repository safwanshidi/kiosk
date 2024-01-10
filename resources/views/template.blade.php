<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FK Kiosk</title>

    <!-- Styles -->
    <link href="{{ asset('/css/register.css') }}" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <header class="container-fluid d-flex justify-content-between align-items-center m-0" style="background-color: #5ea7eb;">
        <a class="nav-link" href="{{ route('homePage') }}">
            <img src="{{ asset('img/FK_logo.png') }}" width="50px" height="50px" alt="Header Kiosk">
        </a>
        <p class="m-0 ml-2" style="font-family: 'Times New Roman', Times, serif;">KIOSK MANAGEMENT SYSTEM</p>
        <div class="d-flex align-items-center">
            <div
                style="width: 40px; height: 40px; background-color: #002171; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-bell text-light"></i>
            </div>
            <div
                style="width: 40px; height: 40px; background-color: #002171; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-left: 10px;">
                <i class="fas fa-phone text-light"></i>
            </div>
        </div>
    </header>

</head>

<body>
    <main style="height: 100vh; font-family: 'Times New Roman', Times, serif; background-image: url('{{ asset('img/Background.jpg') }}'); background-size: cover;">
        @yield('content')
    </main>
</body>

</html>
