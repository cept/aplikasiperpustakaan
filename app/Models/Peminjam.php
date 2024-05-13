<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'jumlah_buku',
        'nama',
        'alamat',
        'nokontak',
        'tanggal',
    ];

    public function book()
    {
        return $this->belongsTo(Books::class);
    }
}
