@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="mt-5">
                    <form method="POST" action="{{ route('confirmStaffRegister') }}">
                        @csrf

                        <div class="form-group row mb-2">
                            <label for="ic" class="col-md-4 col-form-label text-md-right"
                                style="font-weight: bold;">
                                {{ __('IC NUMBER:') }}
                            </label>


                            <div class="col-md-8">
                                <input style="background-color: #d9d9d9" id="ic" type="text"
                                    class="form-control border border-dark @error('ic') is-invalid @enderror"
                                    name="ic" value="{{ old('ic') }}" required autocomplete="ic" autofocus>

                                @error('ic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right"
                                style="font-weight: bold;">{{ __('PASSWORD:') }}</label>

                            <div class="col-md-8">
                                <input style="background-color: #d9d9d9" id="password" type="password"
                                    class="form-control border border-dark @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"
                                style="font-weight: bold;">{{ __('CONFIRM PASSWORD:') }}</label>

                            <div class="col-md-8">
                                <input style="background-color: #d9d9d9" id="password-confirm" type="password"
                                    class="form-control border border-dark" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn border border-dark"
                                    style="border-radius: 20px; background-color: #d9d9d9; width: 120px">
                                    {{ __('CONFIRM') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
