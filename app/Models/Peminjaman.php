<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Nama tabel
    protected $fillable = [
        'kode_buku', 
        'judul', 
        'nama_peminjam', 
        'tanggal_peminjaman', 
        'tanggal_pengembalian', 
        'status'
    ];
}
