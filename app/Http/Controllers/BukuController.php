<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $data_buku = Buku::all();
        $total_buku = $data_buku->count();
        $total_harga = $data_buku->sum('harga');
        
        return view('auth.dashboard', compact('data_buku', 'total_buku', 'total_harga'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
