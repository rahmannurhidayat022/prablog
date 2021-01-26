<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index() {
        $articles = Artikel::all();

        return view('admin.home', compact('articles'));
    }

    public function store(Request $request) {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $hasName = $request->file('gambar')->hashName();
        $path = $request->file('gambar')->move(public_path('assets/uploads'), $hasName);

        $dataBaru = Artikel::create([
            'nama' => $request -> nama,
            'gambar' => $hasName,
            'kota' => $request -> kota,
            'deskripsi' => $request -> deskripsi,
            'kategori' => $request -> kategori,
        ]);

        return redirect()->back();
    }
}
