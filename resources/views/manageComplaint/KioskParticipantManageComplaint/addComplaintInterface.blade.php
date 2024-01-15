@auth
    @if (auth()->user()->role == 'STUDENT' || auth()->user()->role == 'VENDOR')
        @php $template = 'participant'@endphp
    @else
        @php $template = 'admin'@endphp
    @endif
@endauth
@extends($template . 'Template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div>
                    <div class="row mb-4 mt-1" style="background-color: #1a2f77;">
                        <h5 class="text-light mt-2">Complaint > Add Complaint</h5>
                    </div>

                    <div>
                        <form method="post" action="/user/addComplaint">
                            @csrf
                            @method('post')
                            <div class="form-group row mb-2">
                                <label for="c_name" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('FULL NAME:') }}
                                </label>


                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="c_name" type="text"
                                        class="form-control border border-dark @error('c_name') is-invalid @enderror"
                                        name="c_name" required autocomplete="c_name" autofocus>

                                    @error('c_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c_email" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('EMAIL:') }}
                                </label>

                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="c_email" type="text"
                                        class="form-control border border-dark @error('c_email') is-invalid @enderror"
                                        name="c_email" required autocomplete="c_email" autofocus>

                                    @error('c_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c_ic_num" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('IC NUMBER:') }}
                                </label>

                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="c_ic_num" type="text"
                                        class="form-control border border-dark @error('c_ic_num') is-invalid @enderror"
                                        name="c_ic_num" required autocomplete="c_ic_num" autofocus>

                                    @error('c_ic_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c_type" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('DAMAGE TYPE:') }}
                                </label>

                                <div class="col-md-8">
                                    <select style="background-color: #d9d9d9" id="c_type"
                                        class="form-control border border-dark @error('c_type') is-invalid @enderror"
                                        name="c_type" required>
                                        <option>
                                            BROKEN WHEEL
                                        </option>
                                        <option>
                                            BROKEN HINGE</option>
                                        <option>
                                            BROKEN WALL</option>
                                        <option>
                                            OTHERS
                                        </option>
                                    </select>

                                    @error('c_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2"> <label for="c_date"
                                    class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">
                                    {{ __('DATE:') }} </label>
                                <div class="col-md-8"> <input style="background-color: #d9d9d9" id="c_date"
                                        type="text"
                                        class="form-control border border-dark @error('c_date') is-invalid @enderror"
                                        name="c_date" required autocomplete="c_date" autofocus>
                                    <div class="datepicker"></div>
                                    @error('c_date')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="c_details" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('WRITE DETAILS:') }}
                                </label>

                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="c_details" type="text"
                                        class="form-control border border-dark @error('c_details') is-invalid @enderror"
                                        name="c_details" required autocomplete="c_details" autofocus>

                                    @error('c_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn border border-dark"
                                        style="border-radius: 20px; background-color: #1a2f77; width: 120px">
                                        {{ __('MAKE COMPLAINT') }}
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
