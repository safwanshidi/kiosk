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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <header class="container-fluid d-flex justify-content-between align-items-center m-0"
        style="background-color: #5ea7eb;">
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
            <div
                style="width: 40px; height: 40px; background-color: #002171; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-left: 10px;">
                <a href="{{ route('logout') }}">

                    <i class="fas fa-right-from-bracket text-light"></i>
                </a>
            </div>
        </div>
    </header>

</head>

<body>
    <div class="container-fluid"
        style="height: 100vh; font-family: 'Times New Roman', Times, serif; background-image: url('{{ asset('img/Background.jpg') }}'); background-size: cover;">
        <div class="row pt-5">
            {{-- Side Bar --}}
            <div class="col-1"></div>
            <div class="col-2">
                <div class="d-flex align-items-center rounded-pill p-2 mb-5"
                    style="height: 50px; background-color: #dfdfdfe4">
                    <a style="text-decoration: none" class="text-dark" href="{{ route('user.showUserProfile', $user->id) }}">
                        <i class="far fa-circle-user fa-2x mr-3"></i>&nbsp;
                    </a>
                    <p class="mb-0"><strong>{{ $user->name }}</strong></p>
                </div>
                <div class="p-2 mb-4" style=" background-color: #dfdfdfe4; border-radius: 20px;">
                    <p class="mb-1"><strong>Kiosk Application</strong></p>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none"
                            class="mb-1 text-dark"><strong>Cont...</strong></a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none"
                            class="mb-1 text-dark"><strong>Cont...</strong></a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none"
                            class="mb-1 text-dark"><strong>Cont...</strong></a>
                    </div>
                </div>
                <div class="p-2 mb-4" style=" background-color: #dfdfdfe4; border-radius: 20px;">
                    <p class="mb-1"><strong>Payment</strong></p>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none" class="mb-1 text-dark"><strong>Make
                                Payment</strong></a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none" class="mb-1 text-dark"><strong>View User
                                Arrears</strong></a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none" class="mb-1 text-dark"><strong>View
                                Receipt</strong></a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none; font-size: 13px;"
                            class="mb-1 text-dark"><strong>Set Monthly Payment Amount</strong></a>
                    </div>
                </div>

                <div class="p-2 mb-4" style="height: 130px; background-color: #dfdfdfe4; border-radius: 20px;">
                    <p class="mb-1"><strong>Complaint</strong></p>
                    <div class="d-flex align-items-center rounded-pill p-3 mb-1"
                        style="height: 30px; background-color:#002171">
                        <a href={{ '/staffRegistration' }} style="text-decoration: none" class="mb-1 text-light">Manage
                            Complaint</a>
                    </div>
                    <div class="d-flex align-items-center rounded-pill p-3"
                        style="height: 30px; background-color:#5ea7eb">
                        <a href="#" style="text-decoration: none" class="mb-1 text-dark"><strong>Work Order
                                Details</strong></a>
                    </div>
                </div>



            </div>


            <main class="col-9">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
