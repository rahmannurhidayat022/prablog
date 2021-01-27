<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index() {
        $article = DB::table('artikel')->paginate(10);

        return view('landing.index', compact('article'));
    }

    public function detail($id) {
        $article = Artikel::all()->where('id', $id);
        
        return view('landing.detail', compact('article'));
    }

    public function cari(Request $request) {
        // menangkap data pencarian
		$cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $article = DB::table('artikel')
        ->where('nama','like',"%".$cari."%")
        ->orWhere('kota','like',"%".$cari."%")
        ->orWhere('kategori','like',"%".$cari."%")
        ->paginate(10);

        return view('landing.index', compact('article'));
    }
}
