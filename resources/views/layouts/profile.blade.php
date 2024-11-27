<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F4F5F7; /* Boja pozadine stranice */
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: #000; /* Crna boja menija */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #FFF;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #07b9ff;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trudnička knjižica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Glavni meni vidljiv na desktopu -->
                <ul class="navbar-nav d-none d-lg-flex">
                    @if(auth()->check() && auth()->user()->SuperAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="/">Početna stranica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Dodaj novu trudnicu</a>
                    </li>
                    @endif
                </ul>

                <!-- Logout dugme poravnato desno -->
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white">Odjavi se</button>
                        </form>
                    </li>
                    @endauth
                </ul>

                <!-- Hamburger meni (Logout dugme) -->
                <ul class="navbar-nav d-lg-none">
                    @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white">Odjavi se</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
