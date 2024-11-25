<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            margin-bottom: 20px;
        }
    
        body {
        background-color: #F4F5F7;
        font-family: 'Poppins', sans-serif;
        line-height: 0.9;
        }

        input {
            margin-bottom: 10px;
        }

        .sidebar-element {
        background-color: #FFF;
        width: calc(100vw / 4);
        padding: 20px;
        margin: 20px 30px 10px 50px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        letter-spacing: 0.4px;
        line-height: 1.8;
        }
        .container { max-width: 1980px!important;}
        
        .pregledi { margin: 20px auto;}
  

    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trudnička knjižica</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    @if(auth()->check() && auth()->user()->SuperAdmin)
                    <li class="nav-item">
                        <a class="nav-link" href="/">Početna stranica</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Dodaj novu trudnicu</a>
                    </li>
                    @endif

                </ul>
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ auth()->user()->ime }}</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
