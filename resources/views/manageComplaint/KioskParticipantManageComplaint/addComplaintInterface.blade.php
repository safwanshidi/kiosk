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
                        <form method="post" action="/user/addComplaintInterface">
                            @csrf
                            @method('post')
                            <div class="form-group row mb-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('FULL NAME:') }}
                                </label>


                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="name" type="text"
                                        class="form-control border border-dark @error('name') is-invalid @enderror"
                                        name="name" required autocomplete="name" autofocus>

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
                                        name="ic" required autocomplete="ic" autofocus>

                                    @error('ic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="role" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('DAMAGE TYPE:') }}
                                </label>

                                <div class="col-md-8">
                                    <select style="background-color: #d9d9d9" id="role"
                                        class="form-control border border-dark @error('role') is-invalid @enderror"
                                        name="role" required>
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

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-2"> <label for="date"
                                    class="col-md-4 col-form-label text-md-right" style="font-weight: bold;">
                                    {{ __('DATE:') }} </label>
                                <div class="col-md-8"> <input style="background-color: #d9d9d9" id="date"
                                        type="text"
                                        class="form-control border border-dark @error('date') is-invalid @enderror"
                                        name="date" required autocomplete="date" autofocus>
                                    <div class="datepicker"></div>
                                    @error('date')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <label for="phone" class="col-md-4 col-form-label text-md-right"
                                    style="font-weight: bold;">
                                    {{ __('WRITE DETAILS:') }}
                                </label>

                                <div class="col-md-8">
                                    <input style="background-color: #d9d9d9" id="phone" type="text"
                                        class="form-control border border-dark @error('phone') is-invalid @enderror"
                                        name="phone" required autocomplete="phone" autofocus>

                                    @error('phone')
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
