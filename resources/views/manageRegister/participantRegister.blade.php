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
                <div>
                    <div class="row mt-4 mb-4" style="background-color: white;">
                        <h2 class="text-center"><strong>REGISTRATION</strong></h2>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('registerParticipant') }}">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('FULL NAME:') }}
                                </label>


                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="name" type="text"
                                        class="form-control border border-dark @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                <label for="phone" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('PHONE NUMBER:') }}
                                </label>


                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="phone" type="text"
                                        class="form-control border border-dark @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">{{ __('EMAIL ADDRESS:') }}</label>

                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="email" type="email"
                                        class="form-control border border-dark @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">
                                    {{ __('PASSWORD:') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color: #d9d9d9" id="password" type="password"
                                            class="form-control border border-dark @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        <div class="input-group-append" >
                                            <span style="background-color: #d9d9d9"   class="input-group-text mt-1" id="password-toggle" onclick="togglePasswordVisibility()">
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

                            <div class="form-group row mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">
                                    {{ __('CONFIRM PASSWORD:') }}
                                </label>

                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input style="background-color: #d9d9d9" id="password-confirm" type="password"
                                            class="form-control border border-dark" name="password_confirmation" required
                                            autocomplete="new-password">

                                        <div class="input-group-append">
                                            <span style="background-color: #d9d9d9" class="input-group-text text-center mt-1" id="password-confirm-toggle" onclick="togglePasswordConfirmVisibility()">
                                                <i id="password-confirm-icon" class="fa fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <input type="hidden" name="role" id="role" value="STUDENT">

                            <div class="form-group row mb-2 mr-3">
                                <div class="col-2"></div>
                                <div class="col-4 border border-dark role-button selected" data-role="STUDENT">
                                    <span class="role-name">STUDENT</span>
                                </div>
                                <div class="col-4 border border-dark role-button" data-role="VENDOR">
                                    <span class="role-name">VENDOR</span>
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn border border-dark"
                                        style="border-radius: 20px; background-color: #d9d9d9; width: 120px">
                                        {{ __('REGISTER') }}
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
            $('.role-button').click(function() {
                $('.role-button').removeClass('selected');
                $(this).addClass('selected');

                // Get the data-role attribute of the clicked button
                var role = $(this).attr('data-role');

                // Set the value of the hidden input field to the selected role
                $('#role').val(role);
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
    </script>
@endsection
