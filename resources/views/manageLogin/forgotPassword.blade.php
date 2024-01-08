@extends('template')

@section('content')
    <div class="container text-center">
        <div class="row">
            @if (session('reset'))
                <div class="alert alert-success text-center">
                    {{ strtoupper('Reset Email') }} <br>
                    {{ session('reset') }}
                </div>
            @endif
            <div class="card col-md-6 mx-auto mt-5" style="background-color: #d2e9ff">
                <div class="card-header">
                    <h3>Forgot Password</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('forgotPassword.post') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="ic" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn text-light" style="background-color: #002171">Send Password Reset
                            Link</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
