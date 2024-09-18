@extends('layout')

@section('title', 'Edit Buku')
@section('header', 'Edit Buku')

@section('content')
<div class="container">
    <form method="post" action="{{ route('buku.update', $buku->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}">
        </div>
        <div class="form-group">
            <label>Penulis</label>
            <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ $buku->harga }}">
        </div>
        <div class="form-group">
            <label>Tgl. Terbit</label>
            <input type="date" name="tgl_terbit" class="form-control" value="{{ $buku->tgl_terbit }}">
        </div>
        <div><button type="submit" class="btn btn-success">Simpan</button></div>
        <a href="/buku" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
