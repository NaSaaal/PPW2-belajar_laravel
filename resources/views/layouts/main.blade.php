<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>@yield('header', 'Selamat datang di halaman Home')</h1>
        </header>
        
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/game">Game List</a></li>
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>© 2024 Belajar Laravel</p>
        </footer>
    </div>
</body>
</html>
