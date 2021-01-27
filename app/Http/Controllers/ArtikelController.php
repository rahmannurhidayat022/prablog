<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index() {
        $articles = DB::table('artikel')->paginate(10);

        return view('admin.home', compact('articles'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kota' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
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

        if($dataBaru) {
            return redirect()->route('home')->with('success', 'Artikel baru berhasil ditambahkan');
        } else {
            return redirect()->route('home')->with('error', 'Artikel baru gagal ditambahkan....coba lagi!');
        }

    }

    public function updatepage($id) {
        $article = Artikel::all()->where('id', $id);

        return view('admin.edit', compact('article'));
    }

    public function update(Request $request) {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kota' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        //get data Blog by ID
        $post = Artikel::find($request->id);
        $id = Artikel::all()->where('id', $request->id);

        if($request->file('gambar') == "") {
    
            $post->update([
                'nama' => $request -> nama,
                'kota' => $request -> kota,
                'deskripsi' => $request -> deskripsi,
                'kategori' => $request -> kategori,
            ]);
    
        } else {
            $pathOldFile = public_path('assets/uploads'.'/'.$request->gambar);
            //hapus old image
            if(file_exists($pathOldFile)) {
                @unlink($pathOldFile);
            }

            //upload new image
            $hasName = $request->file('gambar')->hashName();
            $path = $request->file('gambar')->move(public_path('assets/uploads'), $hasName);
    
            $post->update([
                'nama' => $request -> nama,
                'gambar' => $hasName,
                'kota' => $request -> kota,
                'deskripsi' => $request -> deskripsi,
                'kategori' => $request -> kategori,
            ]);
    
        }
    
        if($post){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id) {
        $article = Artikel::destroy($id);

        if($article){
            //redirect dengan pesan sukses
            return redirect()->route('home')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('home')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function cari(Request $request) {
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $articles = DB::table('artikel')
        ->where('nama','like',"%".$cari."%")
        ->orWhere('kota','like',"%".$cari."%")
        ->orWhere('kategori','like',"%".$cari."%")
        ->paginate(10);

        return view('admin.home', compact('articles'));
    }

}
