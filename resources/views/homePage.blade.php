@extends('template')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <div>
            <img src="{{ asset('img/FK_logo.png') }}" alt="Logo FK" style="width: 220px; height: 150px;" class="mb-3">
        </div>
        <div class="text-center mb-5" style="color: #25a3fe;">
            <h1><strong>WELCOME TO THE FK <br> KIOSK MANAGEMENT <br> SYSTEM APPLICATION</strong></h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4 d-flex justify-content-center">
                <a href="{{ route('login')}}" class="btn btn-lg border border-dark" style="width: 200px; background-color: #61A0DA;">SIGN
                    IN</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('register') }}" class="btn btn-lg border border-dark"
                    style="width: 200px; background-color: #61A0DA;">REGISTER</a>
            </div>
        </div>
    </div>
@endsection
