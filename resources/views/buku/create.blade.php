@extends('layout')

@section('title', 'Tambah Buku')
@section('header', 'Tambah Buku Baru')

@section('content')
<div class="container">
    <form method="post" action="{{ route('buku.store') }}">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control">
        </div>
        <div class="form-group">
            <label>Tgl. Terbit</label>
            <input type="date" name="tgl_terbit" class="form-control">
        </div>
        <div><button type="submit" class="btn btn-success">Simpan</button></div>
        <a href="/buku" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
