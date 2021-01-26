<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index() {
        $rows = Artikel::all();

        return view('home', compact('articles'));
    }

    public function store(Request $request) {
        $file = Artikel::file('gambar');
        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = public_path() . 'uploads/';
        $file->move($destinationPath,$file->getClientOriginalName());

        $dataBaru = Artikel::create([
            'nama' => $request -> nama,
            'gambar' => $nama_file,
            'kota' => $request -> deskripsi,
            'deskripsi' => $request -> deskripsi,
            'kategori' => $request -> kategori,
        ]);

        return redirect()->back();
    }
}
