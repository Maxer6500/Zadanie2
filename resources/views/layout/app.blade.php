<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Laravel</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registration') }}">Rejestracja</a>
                    </li>
                @else
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link" href="/users/list">Lista użytkówników</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cars.index') }}">Lista pojazdów</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Wyloguj</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    @yield('javascript')
</script>


</body>
</html>
