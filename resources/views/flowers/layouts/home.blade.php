
<!DOCTYPE html>
<html dir="ltr" lang="en">
<!doctype html>
<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>


        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{  route('home')}}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders')}}">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('weather')}}">Погода</a>
                </li>

            </ul>
        </div>
    </nav>

@yield('content')

<footer class="container">
    <p>&copy; Company 2018-2019</p>
</footer>
</body>
</html>