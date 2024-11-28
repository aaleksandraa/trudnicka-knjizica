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
            font-size: 1.6rem!important; /* Postavljena veličina fonta */
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #07b9ff;
        }

        /* Stil za mobilni meni u jednom redu */
        .navbar-nav.d-lg-none {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .navbar-nav.d-lg-none .nav-item {
            margin-right: 35px; /* Razmak između stavki */
        }

        .navbar-nav.d-lg-none .nav-item {
            margin-right: 20px; /* Razmak između stavki */
        }

        /* Poslednja stavka bez dodatnog razmaka */
        .navbar-nav.d-lg-none .nav-item:last-child {
            margin-right: 0;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trudnička knjižica</a>
            
            <!-- Mobilni meni (jedan red, bez hamburger menija) -->
            <ul class="navbar-nav d-lg-none">
                @if(auth()->check() && auth()->user()->SuperAdmin)
                <li class="nav-item">
                    <a class="nav-link" href="/">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Dodaj novu trudnicu</a>
                </li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white">Odjavi se</button>
                    </form>
                </li>
            </ul>
            
            <!-- Desktop meni ostaje nepromenjen -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-none d-lg-flex">
                    @if(auth()->check() && auth()->user()->SuperAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="/">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Dodaj novu trudnicu</a>
                    </li>
                    @endif
                </ul>

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
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
