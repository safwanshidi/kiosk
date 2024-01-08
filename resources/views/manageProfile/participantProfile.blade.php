@extends('participantTemplate')

@section('content')
    <div class="container">
        {{-- {{dd($user)}} --}}
        <div class="row justify-content-center">
            @if (session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif
            <div class="col-8">
                <div>
                    <div class="row mt-1" style="background-color: #1a2f77;">
                        <h5 class="text-light mt-2">Home page</h5>
                    </div>
                    <div class="row bg-light p-3">
                        <h4 class="text-center mt-4 mb-4"><strong>PROFILE</strong></h4>
                        <form method="POST" action="{{ route('user.updateUserProfile', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('FULL NAME:') }}
                                </label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color: #d9d9d9" id="name" type="text"
                                            class="form-control border border-dark @error('name') is-invalid @enderror"
                                            name="name" value="{{ $user->name }}" required autocomplete="name"
                                            autofocus>
                                        <div class="input-group-append" style="line-height: 0;">
                                            <button style="background-color: #d9d9d9"
                                                class="btn btn-outline-secondary text-danger" type="reset">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="ic" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">{{ __('IC NUMBER:') }}</label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color: #d9d9d9" id="ic" type="text"
                                            class="form-control border border-dark @error('ic') is-invalid @enderror"
                                            name="ic" value="{{ $user->ic }}" required autocomplete="ic">
                                        <div class="input-group-append" style="line-height: 0;">
                                            <button style="background-color: #d9d9d9"
                                                class="btn btn-outline-secondary text-danger" type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('ic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('EMAIL:') }}
                                </label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color: #d9d9d9" id="email" type="text"
                                            class="form-control border border-dark @error('email') is-invalid @enderror"
                                            name="email" value="{{ $user->email }}" required autocomplete="email"
                                            autofocus>
                                        <div class="input-group-append" style="line-height: 0;">
                                            <button style="background-color: #d9d9d9"
                                                class="btn btn-outline-secondary text-danger" type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="phone" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('PHONE NUMBER:') }}
                                </label>


                                <div class="col-md-8">
                                    <div class="input-group">

                                        <input style="background-color: #d9d9d9" id="phone" type="text"
                                            class="form-control border border-dark @error('phone') is-invalid @enderror"
                                            name="phone" value="{{ $user->phone }}" required autocomplete="phone"
                                            autofocus>

                                    </div>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('PASSWORD:') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color:#d9d9d9" id="password" type="password"
                                            value="{{ $user->password }}"
                                            class="form-control border border-dark @error('password') is-invalid @enderror"
                                            name="password" disabled autocomplete="new-password">

                                        <div class="input-group-append">
                                            <span style="background-color:#d9d9d9" class="input-group-text mt-1"
                                                id="password-toggle" onclick="togglePasswordVisibility()">
                                                <i id="password-icon" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="text-center mt-3 mb-3"><strong>CHANGE PASSWORD</strong></h5>

                            <div class="form-group row mb-4">
                                <label for="newPassword" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('NEW PASSWORD:') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color:#d9d9d9" id="password-new" type="password"
                                            class="form-control border border-dark" name="newPassword" required
                                            autocomplete="newPassword">

                                        <div class="input-group-append">
                                            <span style="background-color:#d9d9d9"
                                                class="input-group-text text-center mt-1" id="password-new-toggle"
                                                onclick="togglePasswordNewVisibility()">
                                                <i id="password-new-icon" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('CONFIRM PASSWORD:') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color:#d9d9d9" id="password-confirm" type="password"
                                            class="form-control border border-dark" name="password_confirmation" required
                                            autocomplete="new-password">

                                        <div class="input-group-append">
                                            <span style="background-color:#d9d9d9"
                                                class="input-group-text text-center mt-1" id="password-confirm-toggle"
                                                onclick="togglePasswordConfirmVisibility()">
                                                <i id="password-confirm-icon" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn border border-dark text-light"
                                        style="border-radius: 20px; background-color: #1a2f77; width: 120px">
                                        {{ __('UPDATE') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.fa-xmark').click(function() {
                // Find the input field and set its value to an empty string
                $(this).closest('.input-group').find('input[type="text"]').val('');
            });
        });
    </script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordIcon = document.getElementById("password-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            }
        }

        function togglePasswordConfirmVisibility() {
            var passwordConfirmInput = document.getElementById("password-confirm");
            var passwordConfirmIcon = document.getElementById("password-confirm-icon");

            if (passwordConfirmInput.type === "password") {
                passwordConfirmInput.type = "text";
                passwordConfirmIcon.classList.remove("fa-eye-slash");
                passwordConfirmIcon.classList.add("fa-eye");
            } else {
                passwordConfirmInput.type = "password";
                passwordConfirmIcon.classList.remove("fa-eye");
                passwordConfirmIcon.classList.add("fa-eye-slash");
            }
        }

        function togglePasswordNewVisibility() {
            var passwordNewInput = document.getElementById("password-new");
            var passwordNewIcon = document.getElementById("password-new-icon");

            if (passwordNewInput.type === "password") {
                passwordNewInput.type = "text";
                passwordNewIcon.classList.remove("fa-eye-slash");
                passwordNewIcon.classList.add("fa-eye");
            } else {
                passwordNewInput.type = "password";
                passwordNewIcon.classList.remove("fa-eye");
                passwordNewIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
@endsection
