<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'nama',
        'gambar',
        'kota',
        'deskripsi',
        'kategori',
    ];

    public function deleteData($id) {
        DB::table('artikel')
            ->where('id', $id)
            ->delete();
    }
}
