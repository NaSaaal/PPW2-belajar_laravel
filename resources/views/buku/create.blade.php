@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Buku</div>
            <div class="card-body">
                <form action="{{ route('buku.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tgl_terbit">Tanggal Terbit</label>
                        <input type="date" name="tgl_terbit" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection