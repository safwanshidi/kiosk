@extends('template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4" style="background-color: #d2e9ff">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
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


                            <div class="form-group row mb-2">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="role" class="col-md-4 col-form-label text-md-right">
                                    {{ __('ROLE:') }}
                                </label>

                                <div class="col-md-6">
                                    <select id="role"
                                        class="form-control border border-dark @error('role') is-invalid @enderror"
                                        name="role" required>
                                        <option value="" disabled selected hidden>Please select a role</option>
                                        <option value="STUDENT" {{ old('role') == 'STUDENT' ? 'selected' : '' }}>STUDENT
                                        </option>
                                        <option value="VENDOR" {{ old('role') == 'VENDOR' ? 'selected' : '' }}>VENDOR
                                        </option>
                                        <option value="ADMIN" {{ old('role') == 'ADMIN' ? 'selected' : '' }}>ADMIN
                                        </option>
                                        <option value="FK TECHNICAL TEAM"
                                            {{ old('role') == 'FK TECHNICAL TEAM' ? 'selected' : '' }}>FK TECHNICAL TEAM
                                        </option>
                                        <option value="PUPUK ADMIN" {{ old('role') == 'PUPUK ADMIN' ? 'selected' : '' }}>
                                            PUPUK ADMIN</option>
                                        <option value="FK BURSARY" {{ old('role') == 'FK BURSARY' ? 'selected' : '' }}>FK
                                            BURSARY</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn text-light" style="background-color: #002171">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('forgotPassword') }}" class="text-dark">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
