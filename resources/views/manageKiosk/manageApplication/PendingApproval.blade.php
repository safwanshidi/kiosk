@extends('layouts.userNav')

@section('main-content')
    <div class="container2" style="background-color: white; border-radius: 30px; margin-left: 100px; margin-right: 100px;">
        <!-- Add the home button at the top -->
        <div class="mt-4 profile-header pr-5 pl-5 pt-20" style="padding-top: 6rem; margin-top: 9.5rem!important;">
            <div class="text-center">
                <!-- Home Button -->
                <a href="{{ asset('path/to/pupukAdminNav.blade.php') }}" class="btn btn-primary">Home</a>

                <div class="card-header" style="padding-top: -70px;">
                    <img src="{{ asset('assets/tick.png') }}" style="margin-left: -25px;width: 185px;height: 197px;" draggable="false" alt="">
                </div>
                <p style="font-size: 24px; text-align: center;">Your application request has been submitted successfully.</p>
                <p style="font-size: 24px; text-align: center;">You will be notified in your email regarding the status of the application.</p>
                <p style="font-size: 24px; text-align: center;">Thank You.</p>
            </div>
        </div>
    </div>
@endsection
