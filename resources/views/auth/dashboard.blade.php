@extends('auth.layouts')

@section('content')

<!-- Import Bootstrap 4 for styling -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Dashboard</h5>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        N Salman
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Menampilkan Daftar Buku di Dashboard -->
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Daftar Buku</h5>
                    <!-- Tombol Tambah Buku -->
                    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Harga</th>
                            <th>Tanggal Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_buku as $i => $buku)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                                <td>{{ $buku->tgl_terbit->format('d/m/y') }}</td>
                                <td>
                                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit"
                                            class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <p>Total Buku: {{ $total_buku }}</p>
                <p>Total Harga Semua Buku: {{ "Rp. " . number_format($total_harga, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="text-center mt-5">
    <p>&copy; 2024 Aplikasi Buku - Belajar Laravel</p>
</div>

@endsection