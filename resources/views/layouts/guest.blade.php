<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tad&Apd</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'0,
            'wght'400,
            'GRAD'0,
            'opsz'48
    }
    </style>
</head>

<body>
    {{ $slot }}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand pio" href="/">
                <img src="/images/logo_minimal.jpg" alt="" width="40" height="auto"
                    class="d-inline-block align-text-top">
                Tad&Apd
            </a>

            <ul class="nav ms-auto navbar-spaced">
                <li class="">
                    <a class="nav-link active" aria-current="page" href="catalogo">Prodotti</a>
                </li>
                <li class="">
                    <a class="nav-link active" href="">Menù</a>
                </li>
                <li class="nav ms-auto navbar-spaced">
                    <a class="nav-link active" href="contatti">Chi siamo</a>
                </li>
                <!-- se è stato effettuato login si vede solo nome che se cliccato porta alla dashboard altrimenti tasti registra e login -->
                @if (Route::has('login'))

                @auth
                <li class="navbar-spaced">
                    <div class="dropdown">
                        <button class="btn btn-secondary bg-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <a href="{{route('dashboard')}}">{{Auth::user()->name }}</a>
                        </button>
                        <div class="dropdown-content">
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-jet-dropdown-link>
                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-dropdown-link>
                                </form>

                        </div>

                    </div>
                </li>
                @else
                <li class="navbar-spaced">
                    <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                </li>
                <li class="navbar-spaced">
                    <a class="btn btn-success" href="{{route('login')}}">Login</a>
                </li>

                @endauth
                @endif
            </ul>
            <span class="material-symbols-outlined">
                <a href="/carrello">shopping_cart</a>
            </span>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>