<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahkan kode berikut untuk memanggil model Buku
use App\Models\Buku;
class BukuController extends Controller
{

    public function index()
    {
        // Mengambil semua data buku
        $data_buku = Buku::all();

        // Menghitung total jumlah buku
        $total_buku = $data_buku->count();

        // Menghitung total harga dari semua buku
        $total_harga = $data_buku->sum('harga');

        // Mengirim data buku, total_buku, dan total_harga ke view
        return view('buku.index', compact('data_buku', 'total_buku', 'total_harga'));
    }
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku');
    }
}
