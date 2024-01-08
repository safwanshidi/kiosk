@extends('adminTemplate')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div>
                    <div class="row mb-4 mt-1" style="background-color: #1a2f77;">
                        <h5 class="text-light mt-2">Admin &nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp; Staff Registration</h5>
                    </div>

                    <div>
                        <form method="POST" action="{{ route('staff.registerStaff') }}">
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
                                <label for="role" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('ROLE:') }}
                                </label>

                                <div class="col-md-8">
                                    <select style="background-color: #d9d9d9" id="role"
                                        class="form-control border border-dark @error('role') is-invalid @enderror"
                                        name="role" required>
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
@endsection
