<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title' , 'known page')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="">Poster</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact Me</a>
                </li>
                <form method="GET" action="{{route('search')}}" class="form-inline ml-auto">
                    @csrf
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                @auth
                <li class="nav-item">
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('logout') }}">Logout</a>
                </li>
                <a href="{{route('profile')}}" class="nav-item">
                    <li>
                        <span class="navbar-text mx-2">{{ auth()->user()->name }}</span>
                    </li>
                </a>
                <a href="{{route('profile')}}">
                    <li>
                        <img src="{{asset('storage/' . auth()->user()->image)}}" alt="User Image" class="rounded-circle" style="width: 40px; height: 40px;">
                    </li>
                </a>
                @else
                    <li class="nav-item">
                        <a class="btn btn-outline-primary my-2 my-sm-1" href="{{ route('signin') }}">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary my-2 my-sm-1" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>



    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>