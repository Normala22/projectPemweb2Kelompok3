<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Mahasiswa extends Model
// {
//     use HasFactory;

//     protected $table = 'mahasiswa';
// }

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; 
    
    protected $fillable = ['nama', 'nim', 'alamat']; 
}

// class Mahasiswa extends Model
// {
//     use HasFactory;

//     protected $table = 'mahasiswa'; 
    
//     protected $guarded = ['id', 'created_at', 'updated_at']; 
// }