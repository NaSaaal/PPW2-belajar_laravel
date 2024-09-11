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
        @foreach($data_buku as $buku)
        <tr>
            <td>{{ $buku->id }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
            <td>{{ $buku->tgl_terbit->format('d/m/y') }}</td> <!-- Format tanggal -->
            <td>
                <!-- Tambahkan aksi seperti edit atau delete -->
                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
