@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mt-4">
                <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                <div class="card mb-2">
                    <div class="card-body text-center mt-3 mb-3">
                        <h5 class="mt-3"><strong>Congratulation....your account has been successfully created</strong></h5>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="text-dark">LOG IN</a>
            </div>
        </div>
    </div>
@endsection
