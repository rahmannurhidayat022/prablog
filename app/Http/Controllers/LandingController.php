<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class LandingController extends Controller
{
    public function index() {
        $articles = Artikel::all();

        return view('landing.index', compact('articles'));
    }

    public function detail($id) {
        $article = Artikel::all()->where('id', $id);
        
        return view('landing.detail', compact('article'));
    }
}
