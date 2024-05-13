<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'kategori_buku',
        'stok_buku',
        'tahun_buku',
        'cover_buku',
    ];
}
