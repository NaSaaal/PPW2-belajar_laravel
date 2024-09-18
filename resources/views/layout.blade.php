<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Buku')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <header>
            <h1>@yield('header', 'Aplikasi Manajemen Buku')</h1>
            <nav>
                <a href="/buku" class="btn btn-secondary mb-3">Daftar Buku</a>
                <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
            </nav>
        </header>

        <!-- Konten akan dimasukkan di sini -->
        <main>
            @yield('content')
        </main>

        <footer class="mt-5">
            <p class="text-center">© 2024 Aplikasi Buku - Belajar Laravel</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
