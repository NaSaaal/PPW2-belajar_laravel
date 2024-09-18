@extends('layout')

@section('title', 'Daftar Buku')
@section('header', 'Daftar Buku')

@section('content')
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
        @foreach($data_buku as $i=>$buku)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
            <td>{{ $buku->tgl_terbit->format('d/m/y') }}</td>
            <td>
                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>Total Buku: {{ $total_buku }}</p>
<p>Total Harga Semua Buku: {{ "Rp. " . number_format($total_harga, 2, ',', '.') }}</p>
@endsection
