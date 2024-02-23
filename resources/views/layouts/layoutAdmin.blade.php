<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="DAUuPdTs1irkqoIzWszdba5wB5AAZ643DRmbw8S7cOw" />
    <title>RC Wheels</title>
    <link rel="icon" type="image/png" href="images/RC.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="sitemap" type="application/xml" href="/sitemap.xml">
    <!-- Google Font Start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <!-- Google Font End -->
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            list-style: none;
            text-decoration: none;
        }

        :root {
            scroll-behavior: smooth;
        }

        .navbar {
            background-color: #4154CC;
            color: #ebff60;
            justify-content: center;
        }

        .navbar a {
            color: #ffffff;
            font-size: 1.4rem;
            padding: 10px 20px;
            font-weight: 500;
        }

        body {
            padding-top: 70px;
            background-color: #ffffff;
            color: #000000;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        p {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
        } */

        .navbar a:hover {
            color: #ebff66;
            transition: .4s;
        }

        .navbar-toggler-icon {
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/RC.png') }}" alt="Logo" width="50" height="50" class="d-inline-block align-text-center">
                RC Wheels
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/index"><i class="fa fa-home" aria-hidden="true"></i>
                            Konfirmasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products"><i class="fa fa-car" aria-hidden="true"></i>
                            Tambah Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/laporan"><i class="fa fa-history" aria-hidden="true"></i>
                            History</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fa fa-sign-out"
                                        aria-hidden="true"></i> Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
