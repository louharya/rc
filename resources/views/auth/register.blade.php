<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register RC</title>
    <link rel="icon" type="image/png" href="images/RC.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Google Font Start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <!-- Google Font End -->
    <style>
        html,
        body {
            height: 100%;
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            list-style: none;
            text-decoration: none;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background: #4154CC;
        }

        .form-register {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-register .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-register .form-control:focus {
            z-index: 2;
        }

        .form-register input[type="text"],
        .form-register input[type="email"],
        .form-register input[type="password"] {
            margin-bottom: 10px;
            border-radius: 0;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .text-white {
            color: #fff;
        }
    </style>
</head>
<body class="text-center">

    <form class="form-register" method="POST" action="{{ route('register') }}">
        @csrf
        <img class="mb-4" src="{{ asset('images/RC.png') }}" alt="" width="72" height="72">
        <div class="form-group mb-2">
            <label for="name" class="sr-only">Name</label>
            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="form-group mb-2">
            <label for="email" class="sr-only">Email Address</label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
        </div>
        <div class="form-group mb-2">
            <label for="password" class="sr-only">Password</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <div class="form-group mb-2">
            <label for="password-confirm" class="sr-only">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <button class="btn btn-warning btn-block" name="register" style="font-weight:700;" type="submit">Register</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
