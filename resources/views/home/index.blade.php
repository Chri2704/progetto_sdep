<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tortellini</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="/css/app.css" type="text/css"> 
    <style>
        /* Il tuo stile personalizzato qui */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand pio" href="#">
            <img src="/images/logo_minimal.jpg" alt="" width="40" height="auto" class="d-inline-block align-text-top">
            Tad&Apd
        </a>

        <ul class="nav ms-auto navbar-spaced">
            <li class="">
                <a class="nav-link active" aria-current="page" href="#">Catalogo</a>
            </li>
            <li class="">
                <a class="nav-link active" href="">Contact</a>
            </li>
            <li class="navbar-spaced">
                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
            </li>
            <li class="navbar-spaced">
                <a class="btn btn-success" href="{{route('login')}}">Login</a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>




   