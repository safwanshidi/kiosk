<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="mt-5">Your FK Kiosk staff account has been created</h1>
                <div class="card mt-4">
                    <div class="card-body">
                        <p class="card-text">A temporary password and IC number has been set.</p><br>
                        <h5 class="card-title">Your  temporary password:</h5>
                        <p class="card-text">{{ $password }}</p>
                        <h5 class="card-title">Your  temporary IC:</h5>
                        <p class="card-text">{{ $ic }}</p>
                        <p class="card-text">Remember to change your password and IC number after login.</p>
                        <p class="card-text">You can sign in to FK Kiosk using the link below:</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
